<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ads::with(['category','tag'])->get();

        return response()->json([
            "status" => 'success',
            "data" => $ads
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type'          => 'required|string',
            'title'         => 'required|string',
            'description'   => 'required|string',
            'category_id'   => 'required',
            'tags_id'       => 'required',
            'advertiser_id' => 'required',
            'start_date '   => 'required|date'
        ]);

        $ad = Ads::create($request->all());

        return response()->json([
            "status" => 'success',
            "data" => $ad,
            "msg" => "Ad created successfully"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ads $ads)
    {
        return response()->json([
            "status" => 'success',
            "data" => $ads
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ads $ad)
    {
        $request->validate([
            'type'          => 'required|string',
            'title'         => 'required|string',
            'description'   => 'required|string',
            'category_id'   => 'required',
            'tags_id'       => 'required',
            'advertiser_id' => 'required',
            'start_date '   => 'required|date'
        ]);

        $ad->update($request->all());

        return response()->json([
            "status" => 'success',
            "data" => $ad,
            "msg" => "Ad updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ads $ad)
    {
        $ad->delete();
        return response()->json([
            "status" => 'success',
            "data" => $ad,
            "msg" => "Ad deleted successfully"
        ]);
    }

    public function filterByCategory($name)
    {
        $category = Category::where('name', $name)->get();

        foreach($category as $val)
        {
            $category_id = $val->id;
        }
        $result = Ads::where('category_id' , $category_id )->get();

        return response()->json([
            "status" => 'success',
            "data" => $result
        ]);
    }

    public function filterByTag($name)
    {
        $tags = Tag::where('name', $name)->get();

        foreach($tags as $tag)
        {
            $tag_id = $tag->id;
        }
        $result = Ads::where('tags_id' , $tag_id )->get();

        return response()->json([
            "status" => 'success',
            "data" => $result
        ]);
    }
}
