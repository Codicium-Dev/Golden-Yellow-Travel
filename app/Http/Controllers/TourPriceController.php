<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTourPriceRequest;
use App\Http\Requests\UpdateTourPriceRequest;
use App\Models\Inclusion;
use App\Models\TourPrice;
use Illuminate\Support\Facades\Gate;

class TourPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tourPrice = TourPrice::searchQuery()
            ->sortingQuery()
            ->paginationQuery();

        return $this->success("Tour Price List", $tourPrice);
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
    public function store(StoreTourPriceRequest $request)
    {
        $tourPrice = TourPrice::create([
            "tour_id" => $request->tour_id,
            "category" => $request->category,
            "price" => $request->price,
            "sale_price" => $request->sale_price,
            "private_price" => $request->private_price,
            "sale_private_price" => $request->sale_private_price,
        ]);

        return response()->json([
            'message' => 'Tour Price Created successfully',
            'data' => $tourPrice,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $tourPrice = TourPrice::find($id);

        if (is_null($tourPrice)) {
            return response()->json([
                'message' => 'Tour Price Not Found',
            ], 404);
        }

        return response()->json([
            'message' => 'Tour Price Created successfully',
            'data' => $tourPrice,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inclusion $inclusion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTourPriceRequest $request, String $id)
    {
        $tourPrice = TourPrice::find($id);
        if (is_null($tourPrice)) {
            return response()->json([
                'message' => 'Tour Price Not Found',
            ], 404);
        }

        $tourPrice->category = $request->category;
        $tourPrice->price = $request->price;
        $tourPrice->sale_price = $request->sale_price;
        $tourPrice->private_price = $request->private_price;
        $tourPrice->sale_private_price = $request->sale_private_price;

        $tourPrice->update();

        return response()->json([
            'message' => 'Tour Price Updated successfully',
            'data' => $tourPrice
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $tourPrice = TourPrice::find($id);

        if (is_null($tourPrice)) {
            return response()->json([
                'message' => 'Tour Price not Found',
            ], 404);
        }

        if (Gate::denies('delete', $tourPrice)) {
            return response()->json([
                'message' => 'You are no allowed',
            ], 404);
        }

        $tourPrice->delete();

        return response()->json([
            'message' => 'Tour Price deleted successfully',
        ], 200);
    }
}
