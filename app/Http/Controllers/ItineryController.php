<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItineryRequest;
use App\Http\Requests\UpdateItineryRequest;
use App\Http\Resources\ItineryResource;
use App\Models\Itinery;
use Illuminate\Support\Facades\Gate;
use PhpParser\Node\Expr\Cast\String_;

class ItineryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itinerary = Itinery::searchQuery()
            ->sortingQuery()
            ->paginationQuery();

        return response()->json([
            "message" => "itinerary List",
            "data" => ItineryResource::collection($itinerary)
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
    public function store(StoreItineryRequest $request)
    {
        $itinerary = Itinery::create([
            'name' => $request->name,
            "tour_id" => $request->tour_id,
            "description" => $request->description,
            "meal" => $request->meal,
            "accommodation" => $request->accommodation,
            "note" => $request->note,
            'itinerary_photo' => $request->itinerary_photo
        ]);

        return response()->json([
            'message' => 'itinerary Created successfully',
            'data' => $itinerary,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $itinerary = Itinery::find($id);

        if (is_null($itinerary)) {
            return response()->json([
                'message' => 'Itinerary Not Found',
            ], 404);
        }

        return new ItineryResource($itinerary);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Itinery $itinery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItineryRequest $request, String $id)
    {
        $itinerary = Itinery::find($id);
        if (is_null($itinerary)) {
            return response()->json([
                'message' => 'Itinerary Not Found',
            ], 404);
        }

        $itinerary->name = $request->name;
        $itinerary->description = $request->description;
        $itinerary->meal = $request->meal;
        $itinerary->accommodation = $request->accommodation;
        $itinerary->note = $request->note;
        $itinerary->itinerary_photo = $request->itinerary_photo;

        $itinerary->update();

        return response()->json([
            'message' => 'Itinerary Updated successfully',
            'data' => $itinerary
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $itinerary = Itinery::find($id);

        if (is_null($itinerary)) {
            return response()->json([
                'message' => 'Itinerary not Found',
            ], 404);
        }

        if (Gate::denies('delete', $itinerary)) {
            return response()->json([
                'message' => 'You are no allowed',
            ], 404);
        }

        $itinerary->delete();

        return response()->json([
            'message' => 'Itinerary deleted successfully',
        ], 200);
    }
}
