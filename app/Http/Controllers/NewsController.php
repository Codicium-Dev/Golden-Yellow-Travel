<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use PhpParser\Node\Expr\Cast\String_;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::searchQuery()
            ->sortingQuery()
            ->paginationQuery();

        return response()->json([
            "message" => "News",
            "data" => NewsResource::collection($news)
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
    public function store(StoreNewsRequest $request)
    {
        $news = News::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'title_photo' => $request->title_photo
        ]);


        return response()->json([
            'message' => 'News Created successfully',
            'data' => $news,
        ], 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $news = News::find($id);

        if (is_null($news)) {
            return response()->json([
                'message' => 'News Not Found',
            ], 404);
        }

        $newsResource = new NewsResource($news);


        return response()->json([
            'message' => 'News Detail',
            'data' => $newsResource
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, String $id)
    {
        $news = News::find($id);

        if (is_null($news)) {
            return response()->json([
                'message' => 'News Not Found',
            ], 404);
        }

        $news->title = $request->title;
        $news->description = $request->description;
        $news->title_photo = $request->title_photo;

        $news->update();

        return response()->json([
            'message' => 'news Updated successfully',
            'data' => $news
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $news = News::find($id);

        if (is_null($news)) {
            return response()->json([
                'message' => 'News not Found',
            ], 404);
        }

        if (Gate::denies('delete', $news)) {
            return response()->json([
                'message' => 'You are no allowed',
            ], 404);
        }

        $news->delete();

        return response()->json([
            'message' => 'News deleted successfully',
        ], 200);
    }
}
