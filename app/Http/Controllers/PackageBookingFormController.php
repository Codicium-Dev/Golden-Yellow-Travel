<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageBookingFormRequest;
use App\Http\Requests\UpdatePackageBookingFormRequest;
use App\Models\PackageBookingForm;
use Illuminate\Support\Facades\Gate;

class PackageBookingFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $form = PackageBookingForm::searchQuery()
            ->sortingQuery()
            ->paginationQuery();

        return $this->success("Package Booking Form List", $form);
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
    public function store(StorePackageBookingFormRequest $request)
    {
        $form = PackageBookingForm::create([
            'package_tour_id' => $request->package_tour_id,
            'adult' => $request->adult,
            'child' => $request->child,
            'infants' => $request->infants,
            'date' => $request->date,
            'arrival_airport' => $request->arrival_airport,
            'tour_type' => $request->tour_type,
            'accommodation' => $request->accommodation,
            'special_req' => $request->special_req,
            'gender' => $request->gender,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'city' => $request->city,
            'social_media' => $request->social_media,
        ]);


        return response()->json([
            'message' => 'Package Booking Form Created successfully',
            'data' => $form,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $form = PackageBookingForm::find($id);

        if (is_null($form)) {
            return response()->json([
                'message' => 'Package Booking Form Not Found',
            ], 404);
        }

        return response()->json([
            'message' => 'Package Booking Form Detail',
            'data' => $form
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PackageBookingForm $bookingForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePackageBookingFormRequest $request, PackageBookingForm $bookingForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $form = PackageBookingForm::find($id);

        if (is_null($form)) {
            return response()->json([
                'message' => 'Package Booking Form not Found',
            ], 404);
        }

        if (Gate::denies('delete', $form)) {
            return response()->json([
                'message' => 'You are no allowed',
            ], 404);
        }

        $form->delete();

        return response()->json([
            'message' => 'Package Booking Form deleted successfully',
        ], 200);
    }

    public function trash()
    {
        $form = PackageBookingForm::onlyTrashed()->get();

        return response()->json(["message" => "Trash Bin", "data" => $form], 200);
    }

    public function restore(string $id)
    {
        $form = PackageBookingForm::withTrashed()->find($id);

        if (is_null($form)) {
            return response()->json([
                'message' => 'Package Booking Form not Found',
            ], 404);
        }

        $form->restore();

        return response()->json(['message' => 'Package Booking Form restored from trash'], 200);
    }

    public function forceDelete(string $id)
    {
        $form = PackageBookingForm::onlyTrashed()->find($id);

        if (is_null($form)) {
            return response()->json([
                "message" => "There is no Package Booking Form"
            ]);
        }

        $form->forceDelete();

        return response()->json(['message' => 'Package Booking Form is deleted permanently'], 200);
    }

    public function clearTrash()
    {
        $forms = PackageBookingForm::onlyTrashed()->get();

        foreach ($forms as $form) {
            $form->forceDelete();
        }

        return response()->json(['message' => 'Trash Cleared'], 200);
    }
}
