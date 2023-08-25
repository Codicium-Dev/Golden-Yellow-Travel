<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInclusionRequest;
use App\Http\Requests\UpdateInclusionRequest;
use App\Http\Resources\InclusionResource;
use App\Models\Inclusion;
use Illuminate\Support\Facades\Gate;
use PhpParser\Node\Expr\Cast\String_;

class InclusionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inclusion = Inclusion::searchQuery()
            ->sortingQuery()
            ->paginationQuery();

        return response()->json([
            "message" => "inclusion List",
            "data" => InclusionResource::collection($inclusion)
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
    public function store(StoreInclusionRequest $request)
    {
        $inclusion = Inclusion::create([
            "tour_id" => $request->tour_id,
            'start_date' => $request->start_date,
            "end_date" => $request->end_date,
            "category" => $request->category,
            "price" => $request->price,
            "sale_price" => $request->sale_price,
            "private_price" => $request->private_price,
            "sale_private_price" => $request->sale_private_price,
        ]);

        return response()->json([
            'message' => 'Inclusion Created successfully',
            'data' => $inclusion,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $inclusion = Inclusion::find($id);

        if (is_null($inclusion)) {
            return response()->json([
                'message' => 'Inclusion Not Found',
            ], 404);
        }

        return new InclusionResource($inclusion);
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
    public function update(UpdateInclusionRequest $request, String $id)
    {
        $inclusion = Inclusion::find($id);
        if (is_null($inclusion)) {
            return response()->json([
                'message' => 'Inclusion Not Found',
            ], 404);
        }

        $inclusion->start_date = $request->start_date;
        $inclusion->end_date = $request->end_date;
        $inclusion->category = $request->category;
        $inclusion->accommodation = $request->accommodation;
        $inclusion->price = $request->price;
        $inclusion->sale_price = $request->sale_price;
        $inclusion->private_price = $request->private_price;
        $inclusion->sale_private_price = $request->sale_private_price;

        $inclusion->update();

        return response()->json([
            'message' => 'Inclusion Updated successfully',
            'data' => $inclusion
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $inclusion = Inclusion::find($id);

        if (is_null($inclusion)) {
            return response()->json([
                'message' => 'Inclusion not Found',
            ], 404);
        }

        if (Gate::denies('delete', $inclusion)) {
            return response()->json([
                'message' => 'You are no allowed',
            ], 404);
        }

        $inclusion->delete();

        return response()->json([
            'message' => 'Inclusion deleted successfully',
        ], 200);
    }
}
