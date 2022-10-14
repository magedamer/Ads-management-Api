<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            "status" => 'success',
            "data" => $categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::create($request->all());

        return response()->json([
            "status" => 'success',
            "data" => $category,
            "msg" => "Category created successfully"
        ]);
    }

    public function show(Category $category)
    {
        return response()->json([
            "status" => 'success',
            "data" => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category->update($request->all());

        return response()->json([
            "status" => 'success',
            "data" => $category,
            "msg" => "Category updated successfully"
        ]);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            "status" => 'success',
            "data" => $category,
            "msg" => "category deleted successfully"
        ]);
    }
}
