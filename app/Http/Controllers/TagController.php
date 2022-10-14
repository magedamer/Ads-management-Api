<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return response()->json([
            "status" => 'success',
            "data" => $tags
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $tag = Tag::create($request->all());

        return response()->json([
            "status" => 'success',
            "data" => $tag,
            "msg" => "Category created successfully"
        ]);
    }

    public function show(Tag $tag)
    {
        return response()->json([
            "status" => 'success',
            "data" => $tag
        ]);
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $tag->update($request->all());

        return response()->json([
            "status" => 'success',
            "data" => $tag,
            "msg" => "Category updated successfully"
        ]);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->json([
            "status" => 'success',
            "data" => $tag,
            "msg" => "category deleted successfully"
        ]);
    }
}
