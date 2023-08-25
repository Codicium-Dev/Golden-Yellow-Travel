<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageInclusionRequest;
use App\Http\Requests\UpdatePackageInclusionRequest;
use App\Http\Resources\PackageInclusionResource;
use App\Models\PackageInclusion;
use Illuminate\Support\Facades\Gate;
use PhpParser\Node\Expr\Cast\String_;

class PackageInclusionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacInclusion = PackageInclusion::searchQuery()
            ->sortingQuery()
            ->paginationQuery();

        return response()->json([
            "message" => "Package Inclusion List",
            "data" => PackageInclusionResource::collection($pacInclusion)
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
    public function store(StorePackageInclusionRequest $request)
    {
        $pacInclusion = PackageInclusion::create([
            "package_tour_id" => $request->package_tour_id,
            'start_date' => $request->start_date,
            "end_date" => $request->end_date,
            "category" => $request->category,
            "price" => $request->price,
            "sale_price" => $request->sale_price,
            "private_price" => $request->private_price,
            "sale_private_price" => $request->sale_private_price,
        ]);

        return response()->json([
            'message' => 'Package Inclusion Created successfully',
            'data' => $pacInclusion,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $pacInclusion = PackageInclusion::find($id);

        if (is_null($pacInclusion)) {
            return response()->json([
                'message' => 'Package Inclusion Not Found',
            ], 404);
        }

        return new PackageInclusionResource($pacInclusion);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PackageInclusion $packageInclusion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePackageInclusionRequest $request, String $id)
    {
        $pacInclusion = PackageInclusion::find($id);
        if (is_null($pacInclusion)) {
            return response()->json([
                'message' => 'pacInclusion Not Found',
            ], 404);
        }

        $pacInclusion->start_date = $request->start_date;
        $pacInclusion->end_date = $request->end_date;
        $pacInclusion->category = $request->category;
        $pacInclusion->accommodation = $request->accommodation;
        $pacInclusion->price = $request->price;
        $pacInclusion->sale_price = $request->sale_price;
        $pacInclusion->private_price = $request->private_price;
        $pacInclusion->sale_private_price = $request->sale_private_price;

        $pacInclusion->update();

        return response()->json([
            'message' => 'Package Inclusion Updated successfully',
            'data' => $pacInclusion
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $pacInclusion = PackageInclusion::find($id);

        if (is_null($pacInclusion)) {
            return response()->json([
                'message' => 'Package Inclusion not Found',
            ], 404);
        }

        if (Gate::denies('delete', $pacInclusion)) {
            return response()->json([
                'message' => 'You are no allowed',
            ], 404);
        }

        $pacInclusion->delete();

        return response()->json([
            'message' => 'Package Inclusion deleted successfully',
        ], 200);
    }
}
