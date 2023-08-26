<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\InclusionController;
use App\Http\Controllers\ItineryController;
use App\Http\Controllers\NewsContentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PackageInclusionController;
use App\Http\Controllers\PackageItineraryController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\PackageTourController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\TourController;
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

    // Route::group([

    //     'middleware' => 'api',
    //     'namespace' => 'App\Http\Controllers',
    //     'prefix' => 'auth'

    // ], function () {
    //     Route::controller(AuthController::class)->group(function () {
    //         Route::post('register', "register");
    //         Route::get('user-lists', 'showUserLists');
    //         Route::get('your-profile', 'yourProfile');
    //         Route::get('user-profile/{id}', 'checkUserProfile');
    //         Route::put('edit', "edit");
    //         Route::post("logout", 'logout');
    //         Route::post("logout-all", 'logoutFromAllDevices');
    //         Route::put("update-password", 'updatePassword');
    //     });
    // });

    Route::middleware('jwt')->group(function () {

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

        Route::controller(CountryController::class)->prefix("country")->group(function () {
            Route::post("create", "store");
            Route::put("update/{id}", "update");
            Route::delete("destroy/{id}", "destroy");
        });



        Route::controller(CityController::class)->prefix("city")->group(function () {
            Route::post("create", "store");
            Route::put("update/{id}", "update");
            Route::delete("destroy/{id}", "destroy");
        });
        Route::controller(TourController::class)->prefix("tour")->group(function () {
            Route::post("create", "store");
            Route::put("update/{id}", "update");
            Route::delete("destroy/{id}", "destroy");
        });
        Route::controller(ItineryController::class)->prefix("itinerary")->group(function () {
            Route::post("create", "store");
            Route::put("update/{id}", "update");
            Route::delete("destroy/{id}", "destroy");
        });
        Route::controller(InclusionController::class)->prefix("inclusion")->group(function () {
            Route::post("create", "store");
            Route::put("update/{id}", "update");
            Route::delete("destroy/{id}", "destroy");
        });




        Route::controller(PackagesController::class)->prefix("package")->group(function () {
            Route::post("create", "store");
            Route::put("update/{id}", "update");
            Route::delete("destroy/{id}", "destroy");
        });
        Route::controller(PackageTourController::class)->prefix("package-tour")->group(function () {
            Route::post("create", "store");
            Route::put("update/{id}", "update");
            Route::delete("destroy/{id}", "destroy");
        });
        Route::controller(PackageItineraryController::class)->prefix("package-itinerary")->group(function () {
            Route::post("create", "store");
            Route::put("update/{id}", "update");
            Route::delete("destroy/{id}", "destroy");
        });
        Route::controller(PackageInclusionController::class)->prefix("package-inclusion")->group(function () {
            Route::post("create", "store");
            Route::put("update/{id}", "update");
            Route::delete("destroy/{id}", "destroy");
        });




        Route::controller(NewsController::class)->prefix("news")->group(function () {
            Route::post("create", "store");
            Route::put("update/{id}", "update");
            Route::delete("destroy/{id}", "destroy");
        });
        Route::controller(NewsContentController::class)->prefix("news-content")->group(function () {
            Route::post("create", "store");
            Route::put("update/{id}", "update");
            Route::delete("destroy/{id}", "destroy");
        });



        Route::controller(PhotoController::class)->prefix("photo")->group(function () {
            Route::get("list", 'index');
            Route::post("store", 'store');
            Route::get("show/{id}", 'show');
            Route::delete("delete/{id}", 'destroy');
            Route::post('multiple-delete', 'deleteMultiplePhotos');
            Route::get("trash", 'trash');
            Route::patch("restore/{id}", "restore");
            Route::post("force-delete/{id}", "forceDelete");
            Route::post("clear-trash", "clearTrash");
        });
    });

    Route::post('/login', [AuthController::class, 'login']);

    Route::controller(CountryController::class)->prefix("country")->group(function () {
        Route::get("list", "index");
        Route::get("show/{id}", "show");
    });




    Route::controller(CityController::class)->prefix("city")->group(function () {
        Route::get("list", "index");
        Route::get("show/{id}", "show");
    });
    Route::controller(TourController::class)->prefix("tour")->group(function () {
        Route::get("list", "index");
        Route::get("show/{id}", "show");
        Route::get("date-filter", "dateFilter");
    });
    Route::controller(ItineryController::class)->prefix("itinerary")->group(function () {
        Route::get("list", "index");
        Route::get("show/{id}", "show");
    });
    Route::controller(InclusionController::class)->prefix("inclusion")->group(function () {
        Route::get("list", "index");
        Route::get("show/{id}", "show");
    });




    Route::controller(PackagesController::class)->prefix("package")->group(function () {
        Route::get("list", "index");
        Route::get("show/{id}", "show");
    });
    Route::controller(PackageTourController::class)->prefix("package-tour")->group(function () {
        Route::get("list", "index");
        Route::get("show/{id}", "show");
        Route::get("date-filter", "dateFilter");
    });
    Route::controller(PackageItineraryController::class)->prefix("package-itinerary")->group(function () {
        Route::get("list", "index");
        Route::get("show/{id}", "show");
    });
    Route::controller(PackageInclusionController::class)->prefix("package-inclusion")->group(function () {
        Route::get("list", "index");
        Route::get("show/{id}", "show");
    });




    Route::controller(NewsController::class)->prefix("news")->group(function () {
        Route::get("list", "index");
        Route::get("show/{id}", "show");
    });
    Route::controller(NewsContentController::class)->prefix("news-content")->group(function () {
        Route::get("list", "index");
        Route::get("show/{id}", "show");
    });


    Route::get('/blog', [BlogController::class, "index"])->name("blog.index");
    Route::post("/blog", [BlogController::class, "store"])->name("blog.store");
});
