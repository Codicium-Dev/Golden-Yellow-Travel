<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function showUserLists()
    {
        if (Auth::user()->position !== "admin") {
            return response()->json([
                "message" => "You Are Not Allowed"
            ]);
        }

        $users = User::all();
        return response()->json([
            "message" => "User Lists",
            "users" => $users
        ]);
    }

    public function checkUserProfile($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return response()->json([
                "error" => "User not found"
            ], 404);
        }

        return response()->json([
            "message" => "User",
            "users" => $user
        ]);
    }

    public function yourProfile()
    {
        $profile = User::where("id", Auth::id())->latest("id")->get();

        return response()->json([
            "message" => "Your Profile",
            "user-profile" => $profile
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            "name" => "required|min:3|max:20",
            "email" => "email|required|unique:users",
            "position" => "required",
            "password" => "required|confirmed|min:6",
        ]);

        Gate::authorize("admin-only");

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            'position' => $request->position,
            "password" => Hash::make($request->password),
        ]);

        return response()->json([
            "message" => "user register successfully",
            "data" => $user
        ]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            "name" => "required|min:3|max:20",
        ]);

        $user = User::find(Auth::id());
        if (is_null($user)) {
            return response()->json([
                "message" => "User not found"
            ]);
        }

        if ($request->has('name')) {
            $user->name = $request->name;
        }

        $user->update();

        return response()->json([
            "message" => "Info Updated successfully",
            "data" => $user
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => "email|required",
            "password" => "required|min:6",
        ]);

        if (!Auth::attempt($request->only('email', "password"))) {
            return response()->json([
                "message" => "User Name or Password Wrong",
            ]);
        };

        $token = $request->user()->createToken($request->has("device") ? $request->device : 'unknown');

        return response()->json([
            "message" => "login successfully",
            "device_name" => $token->accessToken->name,
            "token" => $token->plainTextToken
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            "message" => "Logout successful",
        ]);
    }

    public function logoutFromAllDevices(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            "message" => "Logout All Successfully",
        ]);
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', "current_password"],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        Gate::authorize("admin-only");

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json([
            "message" => "Password Updated",
        ]);
    }
}
