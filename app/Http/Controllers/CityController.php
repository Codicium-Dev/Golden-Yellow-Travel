<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Support\Facades\Gate;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $city = City::searchQuery()
            ->sortingQuery()
            ->paginationQuery();



        return response()->json([
            "data" => CityResource::collection($city)
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreCityRequest $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {

        $city = City::create([
            'name' => $request->name,
            'country_id' => $request->country_id,
            'city_photo' => $request->city_photo
        ]);


        return response()->json([
            'message' => 'City Created successfully',
            'data' => $city,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $city = City::find($id);

        if (is_null($city)) {
            return response()->json([
                'message' => 'City Not Found',
            ], 404);
        }

        return new CityResource($city);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, $id)
    {
        $city = City::find($id);

        if (is_null($city)) {
            return response()->json([
                'message' => 'City Not Found',
            ], 404);
        }

        $city->name = $request->name;
        $city->city_photo = $request->city_photo;

        $city->update();

        return response()->json([
            'message' => 'City Updated successfully',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $city = City::find($id);

        if (is_null($city)) {
            return response()->json([
                'message' => 'City not Found',
            ], 404);
        }

        if (Gate::denies('delete', $city)) {
            return response()->json([
                'message' => 'you are no allowed',
            ], 404);
        }

        $city->delete();

        return response()->json([
            'message' => 'City deleted successfully',
        ]);
    }
}
