<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingFormRequest;
use App\Http\Requests\UpdateBookingFormRequest;
use App\Models\BookingForm;
use Illuminate\Support\Facades\Gate;

class BookingFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $form = BookingForm::searchQuery()
            ->sortingQuery()
            ->paginationQuery();

        return $this->success("Booking Form List", $form);
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
    public function store(StoreBookingFormRequest $request)
    {
        $form = BookingForm::create([
            'tour_id' => $request->tour_id,
            'gender' => $request->gender,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'city' => $request->city,
            'social_media' => $request->social_media,
        ]);


        return response()->json([
            'message' => 'Booking Form Created successfully',
            'data' => $form,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $form = BookingForm::find($id);

        if (is_null($form)) {
            return response()->json([
                'message' => 'Booking Form Not Found',
            ], 404);
        }

        return response()->json([
            'message' => 'Booking Form Detail',
            'data' => $form
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookingForm $bookingForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingFormRequest $request, BookingForm $bookingForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $form = BookingForm::find($id);

        if (is_null($form)) {
            return response()->json([
                'message' => 'Booking Form not Found',
            ], 404);
        }

        if (Gate::denies('delete', $form)) {
            return response()->json([
                'message' => 'You are no allowed',
            ], 404);
        }

        $form->delete();

        return response()->json([
            'message' => 'Booking From deleted successfully',
        ], 200);
    }

    public function trash()
    {
        $form = BookingForm::onlyTrashed()->get();

        return response()->json(["message" => "Trash Bin", "data" => $form], 200);
    }

    public function deletedForm($id)
    {
        $form = BookingForm::onlyTrashed()->find($id);


        if (is_null($form)) {
            return response()->json([
                "message" => "There is no form"
            ]);
        }

        return $this->success('Trash', $form);
    }


    public function restore(string $id)
    {
        $form = BookingForm::withTrashed()->find($id);

        if (is_null($form)) {
            return response()->json([
                'message' => 'Booking Form not Found',
            ], 404);
        }

        $form->restore();

        return response()->json(['message' => 'Booking Form restored from trash'], 200);
    }

    public function forceDelete(string $id)
    {
        $form = BookingForm::onlyTrashed()->find($id);

        if (is_null($form)) {
            return response()->json([
                "message" => "There is no Booking Form"
            ]);
        }

        $form->forceDelete();

        return response()->json(['message' => 'Booking Form is deleted permanently'], 200);
    }

    public function clearTrash()
    {
        $forms = BookingForm::onlyTrashed()->get();

        foreach ($forms as $form) {
            $form->forceDelete();
        }

        return response()->json(['message' => 'Trash Cleared'], 200);
    }
}
