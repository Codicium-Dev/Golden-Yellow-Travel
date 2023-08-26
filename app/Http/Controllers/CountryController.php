<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $country = Country::searchQuery()
            ->sortingQuery()
            ->paginationQuery();

        return response()->json([
            "message" => "Country",
            "data" => CountryResource::collection($country)
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreCountryRequest $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request)
    {

        $country = Country::create([
            'name' => $request->name,
            'country_photo' => $request->country_photo
        ]);


        return response()->json([
            'message' => 'Country Created successfully',
            'data' => $country,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $country = Country::find($id);

        if (is_null($country)) {
            return response()->json([
                'message' => 'Country Not Found',
            ], 404);
        }

        $countryResource = new CountryResource($country);


        return response()->json([
            'message' => 'Country Detail',
            'data' => $countryResource
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, $id)
    {
        $country = Country::find($id);

        if (is_null($country)) {
            return response()->json([
                'message' => 'Country Not Found',
            ], 404);
        }

        $country->name = $request->name;
        $country->country_photo = $request->country_photo;

        $country->update();

        return response()->json([
            'message' => 'Country Updated successfully',
            'data' => $country
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $country = Country::find($id);

        if (is_null($country)) {
            return response()->json([
                'message' => 'Country not Found',
            ], 404);
        }

        if (Gate::denies('delete', $country)) {
            return response()->json([
                'message' => 'you are no allowed',
            ], 404);
        }

        $country->delete();

        return response()->json([
            'message' => 'Country deleted successfully',
        ]);
    }
}
