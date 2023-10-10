<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscribeRequest;
use App\Http\Requests\UpdateSubscribeRequest;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Gate;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $form = Subscribe::searchQuery()
            ->sortingQuery()
            ->paginationQuery();

        return $this->success("Subscriber List", $form);
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
    public function store(StoreSubscribeRequest $request)
    {
        $form = Subscribe::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);


        return response()->json([
            'message' => 'Subscribed Successfully',
            'data' => $form,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $form = Subscribe::find($id);

        if (is_null($form)) {
            return response()->json([
                'message' => 'Subscriber Not Found',
            ], 404);
        }

        return response()->json([
            'message' => 'Subscriber Detail',
            'data' => $form
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscribe $Subscribe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubscribeRequest $request, Subscribe $Subscribe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $form = Subscribe::find($id);

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
        $form = Subscribe::onlyTrashed()->searchQuery()->sortingQuery()->paginationQuery();

        return $this->success('Trash Bin', $form);
    }

    public function deletedSubscriber($id)
    {
        $form = Subscribe::onlyTrashed()->find($id);


        if (is_null($form)) {
            return response()->json([
                "message" => "There is no Subscriber"
            ]);
        }

        return $this->success('Trash', $form);
    }

    public function restore(string $id)
    {
        $form = Subscribe::withTrashed()->find($id);

        if (is_null($form)) {
            return response()->json([
                'message' => 'Subscriber not Found',
            ], 404);
        }

        $form->restore();

        return response()->json(['message' => 'Subscriber restored from trash'], 200);
    }

    public function forceDelete(string $id)
    {
        $form = Subscribe::onlyTrashed()->find($id);

        if (is_null($form)) {
            return response()->json([
                "message" => "There is no Subscriber"
            ]);
        }

        $form->forceDelete();

        return response()->json(['message' => 'Subscriber is deleted permanently'], 200);
    }

    public function clearTrash()
    {
        $forms = Subscribe::onlyTrashed()->get();

        foreach ($forms as $form) {
            $form->forceDelete();
        }

        return response()->json(['message' => 'Trash Cleared'], 200);
    }
}
