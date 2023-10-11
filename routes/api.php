<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingFormController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\InclusionController;
use App\Http\Controllers\InquiryFormController;
use App\Http\Controllers\ItineryController;
use App\Http\Controllers\NewsContentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TourPriceController;
use App\Models\InquiryForm;
use App\Models\PackageInclusion;
use App\Models\PackageTourPrice;
use App\Models\TourPrice;
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
        Route::controller(TourPriceController::class)->prefix("price")->group(function () {
            Route::post("create", "store");
            Route::put("update/{id}", "update");
            Route::delete("destroy/{id}", "destroy");
        });
        Route::controller(InclusionController::class)->prefix("inclusion")->group(function () {
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
            Route::post("store", 'store');
            Route::delete("delete/{id}", 'destroy');
            Route::post('multiple-delete', 'deleteMultiplePhotos');
            Route::get("trash", 'trash');
            Route::get("deleted-photo/{id}", 'deletedPhoto');
            Route::patch("restore/{id}", "restore");
            Route::post("force-delete/{id}", "forceDelete");
            Route::post("clear-trash", "clearTrash");
        });

        Route::controller(InquiryFormController::class)->prefix("form")->group(function () {
            Route::get("show/{id}", "show");
            Route::delete("delete/{id}", 'destroy');
            Route::get("trash", 'trash');
            Route::get("deleted-form/{id}", 'deletedForm');
            Route::patch("restore/{id}", "restore");
            Route::post("force-delete/{id}", "forceDelete");
            Route::post("clear-trash", "clearTrash");
        });

        Route::controller(BookingFormController::class)->prefix("book-form")->group(function () {
            Route::get("show/{id}", "show");
            Route::delete("delete/{id}", 'destroy');
            Route::get("trash", 'trash');
            Route::get("deleted-form/{id}", 'deletedForm');
            Route::patch("restore/{id}", "restore");
            Route::post("force-delete/{id}", "forceDelete");
            Route::post("clear-trash", "clearTrash");
        });
        Route::controller(SubscribeController::class)->prefix("subscribe")->group(function () {
            Route::get("show/{id}", "show");
            Route::delete("delete/{id}", 'destroy');
            Route::get("trash", 'trash');
            Route::get("deleted-form/{id}", 'deletedForm');
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
        Route::get("filter", "filteredTour");
        Route::get("show/{id}", "show");
        Route::get("date-filter", "dateFilter");
    });
    Route::controller(ItineryController::class)->prefix("itinerary")->group(function () {
        Route::get("list", "index");
        Route::get("show/{id}", "show");
    });
    Route::controller(TourPriceController::class)->prefix("price")->group(function () {
        Route::get("list", "index");
        Route::get("show/{id}", "show");
    });
    Route::controller(InclusionController::class)->prefix("inclusion")->group(function () {
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



    Route::controller(PhotoController::class)->prefix("photo")->group(function () {
        Route::get("list", "index");
        Route::get("show/{id}", "show");
    });

    Route::controller(InquiryFormController::class)->prefix("form")->group(function () {
        Route::get("list", "index");
        Route::post("create", "store");
    });

    Route::controller(BookingFormController::class)->prefix("book-form")->group(function () {
        Route::get("list", "index");
        Route::post("create", "store");
    });

    Route::controller(SubscribeController::class)->prefix("subscribe")->group(function () {
        Route::get("list", "index");
        Route::post("create", "store");
    });


    Route::get('/blog', [BlogController::class, "index"])->name("blog.index");
    Route::post("/blog", [BlogController::class, "store"])->name("blog.store");
});
