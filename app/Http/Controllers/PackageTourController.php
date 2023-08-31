<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageTourRequest;
use App\Http\Requests\UpdatePackageTourRequest;
use App\Http\Resources\PackageTourResource;
use App\Models\PackageTour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PackageTourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packageTour = PackageTour::searchQuery()
            ->sortingQuery()
            ->paginationQuery();


        return $this->success("Package Tour List", $packageTour);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePackageTourRequest $request)
    {
        $packageTour = PackageTour::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            "package_id" => $request->package_id,
            "overview" => $request->overview,
            "price" => $request->price,
            "sale_price" => $request->sale_price,
            "location" => $request->location,
            "departure" => $request->departure,
            "theme" => $request->theme,
            "duration" => $request->duration,
            "rating" => $request->rating,
            "type" => $request->type,
            "style" => $request->style,
            "for_whom" => $request->for_whom,
            'package_tour_photo' => $request->package_tour_photo
        ]);


        return response()->json([
            'message' => 'Package Tour Created successfully',
            'data' => $packageTour,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $packageTour = PackageTour::find($id);

        if (is_null($packageTour)) {
            return response()->json([
                'message' => 'Package Tour Not Found',
            ], 404);
        }

        $packageTourResource = new PackageTourResource($packageTour);


        return response()->json([
            'message' => 'Package Tour Detail',
            'data' => $packageTourResource
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PackageTour $packageTour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePackageTourRequest $request, String $id)
    {
        $packageTour = PackageTour::find($id);
        if (is_null($packageTour)) {
            return response()->json([
                'message' => 'Package Tour Not Found',
            ], 404);
        }

        $packageTour->name = $request->name;
        $packageTour->start_date = $request->start_date;
        $packageTour->end_date = $request->end_date;
        $packageTour->overview = $request->overview;
        $packageTour->price = $request->price;
        $packageTour->sale_price = $request->sale_price;
        $packageTour->location = $request->location;
        $packageTour->departure = $request->departure;
        $packageTour->theme = $request->theme;
        $packageTour->duration = $request->duration;
        $packageTour->rating = $request->rating;
        $packageTour->type = $request->type;
        $packageTour->style = $request->style;
        $packageTour->for_whom = $request->for_whom;
        $packageTour->package_tour_photo = $request->package_tour_photo;

        $packageTour->update();

        return response()->json([
            'message' => 'Package Tour Updated successfully',
            'data' => $packageTour
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $packageTour = PackageTour::find($id);

        if (is_null($packageTour)) {
            return response()->json([
                'message' => 'Package Tour not Found',
            ], 404);
        }

        if (Gate::denies('delete', $packageTour)) {
            return response()->json([
                'message' => 'You are no allowed',
            ], 404);
        }

        $packageTour->delete();

        return response()->json([
            'message' => 'Package Tour deleted successfully',
        ], 200);
    }

    public function dateFilter(Request $request)
    {
        $start_date = $request->date;

        $result = PackageTour::whereDate('date', "<=", $start_date)->get();

        return response()->json([
            'message' => "Filtered Result",
            "data" => $result
        ], 200);
    }
}
