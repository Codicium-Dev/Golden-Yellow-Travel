<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Models\BlogModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blog = BlogModel::searchQuery()->sortingQuery()->paginationQuery();

        return response()->json([
            "data" => $blog
        ]);
    }

    public function store(StoreBlogRequest $request)
    {
        $product = new BlogModel();
        $product->title = $request->title;
        $product->description = $request->description;
        // $product->user_id = Auth::id();
        // $product->actual_price = $request->actual_price;
        // $product->sale_price = $request->sale_price;
        // $product->unit = $request->unit;
        // // $product->total_stock = 0;
        // $product->more_information = $request->more_information;
        // // $product->photo = Photo::find(1)->url;
        // $product->photo = $request->photo;

        $product->save();
        return response()->json([
            "data" => $product,
        ]);
    }
}
