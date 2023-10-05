<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInquiryFormRequest;
use App\Http\Requests\UpdateInquiryFormRequest;
use App\Models\InquiryForm;
use Illuminate\Support\Facades\Gate;
use PhpParser\Node\Expr\Cast\String_;

class InquiryFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $form = InquiryForm::searchQuery()
            ->sortingQuery()
            ->paginationQuery();

        return $this->success("Form List", $form);
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
    public function store(StoreInquiryFormRequest $request)
    {
        $form = InquiryForm::create([
            'travel_month' => $request->travel_month,
            'travel_year' => $request->travel_year,
            'stay_days' => $request->stay_days,
            'budget' => $request->budget,
            'adult_count' => $request->adult_count,
            'child_count' => $request->child_count,
            'interest' => $request->interest,
            'destinations' => $request->destinations,
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'own_country' => $request->own_country,
            'accommodation' => $request->accommodation,
            'how_u_know' => $request->how_u_know,
            'other_information' => $request->other_information,
            'special_note' => $request->special_note,
        ]);


        return response()->json([
            'message' => 'Form Created successfully',
            'data' => $form,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $form = InquiryForm::find($id);

        if (is_null($form)) {
            return response()->json([
                'message' => 'Form Not Found',
            ], 404);
        }

        return response()->json([
            'message' => 'Form Detail',
            'data' => $form
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InquiryForm $inquiryForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInquiryFormRequest $request, InquiryForm $inquiryForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $form = InquiryForm::find($id);

        if (is_null($form)) {
            return response()->json([
                'message' => 'Form not Found',
            ], 404);
        }

        if (Gate::denies('delete', $form)) {
            return response()->json([
                'message' => 'You are no allowed',
            ], 404);
        }

        $form->delete();

        return response()->json([
            'message' => 'From deleted successfully',
        ], 200);
    }

    public function trash()
    {
        $form = InquiryForm::onlyTrashed()->searchQuery()->sortingQuery()->paginationQuery();

        return $this->success('Trash Bin', $form);
    }

    public function deletedForm($id)
    {
        $form = InquiryForm::onlyTrashed()->find($id);


        if (is_null($form)) {
            return response()->json([
                "message" => "There is no form"
            ]);
        }

        return $this->success('Trash', $form);
    }

    public function restore(string $id)
    {
        $form = InquiryForm::withTrashed()->find($id);

        if (is_null($form)) {
            return response()->json([
                'message' => 'Form not Found',
            ], 404);
        }

        $form->restore();

        return response()->json(['message' => 'Form restored from trash'], 200);
    }

    public function forceDelete(string $id)
    {
        $form = InquiryForm::onlyTrashed()->find($id);

        if (is_null($form)) {
            return response()->json([
                "message" => "There is no Form"
            ]);
        }

        $form->forceDelete();

        return response()->json(['message' => 'Form is deleted permanently'], 200);
    }

    public function clearTrash()
    {
        $forms = InquiryForm::onlyTrashed()->get();

        foreach ($forms as $form) {
            $form->forceDelete();
        }

        return response()->json(['message' => 'Trash Cleared'], 200);
    }
}
