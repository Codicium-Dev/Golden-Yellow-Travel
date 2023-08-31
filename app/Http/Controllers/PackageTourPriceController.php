<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageTourPriceRequest;
use App\Http\Requests\UpdatePackageTourPriceRequest;
use App\Models\PackageTourPrice;
use Illuminate\Support\Facades\Gate;

class PackageTourPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacTourPrice = PackageTourPrice::searchQuery()
            ->sortingQuery()
            ->paginationQuery();

        return $this->success("Package Tour Price List", $pacTourPrice);
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
    public function store(StorePackageTourPriceRequest $request)
    {
        $pacTourPrice = PackageTourPrice::create([
            "package_tour_id" => $request->package_tour_id,
            "category" => $request->category,
            "price" => $request->price,
            "sale_price" => $request->sale_price,
            "private_price" => $request->private_price,
            "sale_private_price" => $request->sale_private_price,
        ]);

        return response()->json([
            'message' => 'Package Tour Price Created successfully',
            'data' => $pacTourPrice,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $pacTourPrice = PackageTourPrice::find($id);

        if (is_null($pacTourPrice)) {
            return response()->json([
                'message' => 'Package Inclusion Not Found',
            ], 404);
        }

        return response()->json([
            'message' => 'Package Tour Price Created successfully',
            'data' => $pacTourPrice,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PackageTourPrice $packageInclusion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePackageTourPriceRequest $request, String $id)
    {
        $pacTourPrice = PackageTourPrice::find($id);
        if (is_null($pacTourPrice)) {
            return response()->json([
                'message' => 'Package Tour Price Not Found',
            ], 404);
        }

        $pacTourPrice->category = $request->category;
        $pacTourPrice->price = $request->price;
        $pacTourPrice->sale_price = $request->sale_price;
        $pacTourPrice->private_price = $request->private_price;
        $pacTourPrice->sale_private_price = $request->sale_private_price;

        $pacTourPrice->update();

        return response()->json([
            'message' => 'Package Tour Price Updated successfully',
            'data' => $pacTourPrice
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $pacTourPrice = PackageTourPrice::find($id);

        if (is_null($pacTourPrice)) {
            return response()->json([
                'message' => 'Package Tour Price not Found',
            ], 404);
        }

        if (Gate::denies('delete', $pacTourPrice)) {
            return response()->json([
                'message' => 'You are no allowed',
            ], 404);
        }

        $pacTourPrice->delete();

        return response()->json([
            'message' => 'Package Tour Price deleted successfully',
        ], 200);
    }
}
