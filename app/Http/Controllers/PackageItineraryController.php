<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageItineraryRequest;
use App\Http\Requests\UpdatePackageItineraryRequest;
use App\Http\Resources\PackageItineraryResource;
use App\Models\PackageItinerary;
use Illuminate\Support\Facades\Gate;

class PackageItineraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itinerary = PackageItinerary::searchQuery()
            ->sortingQuery()
            ->paginationQuery();

        return response()->json([
            "message" => "itinerary List",
            "data" => PackageItineraryResource::collection($itinerary)
        ], 200);
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
    public function store(StorePackageItineraryRequest $request)
    {
        $itinerary = PackageItinerary::create([
            'name' => $request->name,
            "package_tour_id" => $request->package_tour_id,
            "description" => $request->description,
            "meal" => $request->meal,
            "accommodation" => $request->accommodation,
            "note" => $request->note,
            'package_itinerary_photo' => $request->package_itinerary_photo
        ]);

        return response()->json([
            'message' => 'Package Itinerary Created successfully',
            'data' => $itinerary,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $itinerary = PackageItinerary::find($id);

        if (is_null($itinerary)) {
            return response()->json([
                'message' => 'Package Itinerary Not Found',
            ], 404);
        }

        return new PackageItineraryResource($itinerary);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PackageItinerary $packageItinerary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePackageItineraryRequest $request, String $id)
    {

        $itinerary = PackageItinerary::find($id);
        if (is_null($itinerary)) {
            return response()->json([
                'message' => 'Package Itinerary Not Found',
            ], 404);
        }

        $itinerary->name = $request->name;
        $itinerary->description = $request->description;
        $itinerary->meal = $request->meal;
        $itinerary->accommodation = $request->accommodation;
        $itinerary->note = $request->note;
        $itinerary->package_itinerary_photo = $request->package_itinerary_photo;

        $itinerary->update();

        return response()->json([
            'message' => 'Package Itinerary Updated successfully',
            'data' => $itinerary
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $itinerary = PackageItinerary::find($id);

        if (is_null($itinerary)) {
            return response()->json([
                'message' => 'Package Itinerary not Found',
            ], 404);
        }

        if (Gate::denies('delete', $itinerary)) {
            return response()->json([
                'message' => 'You are no allowed',
            ], 404);
        }

        $itinerary->delete();

        return response()->json([
            'message' => 'Package Itinerary deleted successfully',
        ], 200);
    }
}
