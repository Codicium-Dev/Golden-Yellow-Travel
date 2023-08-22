<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Exception;

class AuthController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login']]);
    // }

    /**
     * APIs for user login
     *
     * @bodyParam username required.
     * @bodyParam password required.
     */
    public function login(LoginRequest $request)
    {
        $payload = collect($request->validated());

        try {
            $token = auth()->attempt($payload->toArray());

            if ($token) {
                return $this->createNewToken($token);
            } else {
                return $this->unauthorized();
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * APIs for user login out
     */
    public function logout()
    {
        auth()->logout();

        return $this->success('User successfully signed out', null);
    }

    /**
     * APIs for refresh token
     */
    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Change Password
     *
     * @bodyParam password.
     */
    public function changePassword(ChangePasswordRequest $request, $id)
    {
        $payload = collect($request->validated());
        $payload['password'] = bcrypt($payload['password']);
        $authId = auth()->user()->id;

        if ($authId !== $id) {
            return $this->unauthenticated('you do not have permission to change password');
        }

        DB::beginTransaction();

        try {
            $user = User::findOrFail($id);
            $user->update($payload->toArray());
            DB::commit();

            return $this->success('user is successfully change new password', $user);
        } catch (Exception $e) {
            DB::rollback();

            return $e;
        }
    }

    protected function createNewToken($token)
    {
        return $this->success('User successfully signed in', [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth()->user(),
        ]);
    }
}
