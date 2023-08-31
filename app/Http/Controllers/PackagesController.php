<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackagesRequest;
use App\Http\Requests\UpdatePackagesRequest;
use App\Http\Resources\PackageResource;
use App\Models\Packages;
use Illuminate\Support\Facades\Gate;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Packages::searchQuery()
            ->sortingQuery()
            ->paginationQuery();



        return $this->success("Package List", $packages);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StorePackagesRequest $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePackagesRequest $request)
    {

        $packages = Packages::create([
            'name' => $request->name,
            'country_id' => $request->country_id,
            'package_photo' => $request->package_photo
        ]);


        return response()->json([
            'message' => 'Package Created successfully',
            'data' => $packages,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $packages = Packages::find($id);

        if (is_null($packages)) {
            return response()->json([
                'message' => 'Package Not Found',
            ], 404);
        }


        $resourcePackage = new PackageResource($packages);

        return response()->json([
            'message' => 'Package Detail',
            "data" => $resourcePackage
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Packages $packages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePackagesRequest $request, $id)
    {
        $packages = Packages::find($id);

        if (is_null($packages)) {
            return response()->json([
                'message' => 'Package Not Found',
            ], 404);
        }

        $packages->name = $request->name;
        $packages->package_photo = $request->package_photo;

        $packages->update();

        return response()->json([
            'message' => 'Package Updated successfully',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $packages = packages::find($id);

        if (is_null($packages)) {
            return response()->json([
                'message' => 'Package not Found',
            ], 404);
        }

        if (Gate::denies('delete', $packages)) {
            return response()->json([
                'message' => 'You are no allowed',
            ], 404);
        }

        $packages->delete();

        return response()->json([
            'message' => 'Package deleted successfully',
        ], 200);
    }
}
