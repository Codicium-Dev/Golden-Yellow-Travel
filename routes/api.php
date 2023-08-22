<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PhotoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix("v1")->group(function () {

    Route::middleware('auth:sanctum')->group(function () {

        Route::controller(AuthController::class)->group(function () {
            Route::post('create-user', "register");
            Route::get('user-lists', 'showUserLists');
            Route::get('your-profile', 'yourProfile');
            Route::get('user-profile/{id}', 'checkUserProfile');
            Route::put('edit', "edit");
            Route::post("logout", 'logout');
            Route::post("logout-all", 'logoutFromAllDevices');
            Route::put("update-password", 'updatePassword');
        });

        Route::apiResource("country", CountryController::class);
        Route::apiResource('photo', PhotoController::class)->only(['index', "store", "show", "destroy"]);
        Route::post('photo/multiple-delete', [PhotoController::class, 'deleteMultiplePhotos']);
    });

    Route::post('login', [AuthController::class, 'login']);
    Route::get('blog', [BlogController::class, "index"]);
    Route::post("blog", [BlogController::class, "store"]);
});
