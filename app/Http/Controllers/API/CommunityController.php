<?php

namespace App\Http\Controllers\Api;

use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommunityResource;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        {
            return CommunityResource::collection(Community::all());
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $community= Community::create([
            'title'=> $request->title,
            'body'=> $request->body,
        ]);
        return new CommunityResource($community);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function show(Community $community)
    {
        if (!($community->id)) return response()->json(['error' => 'Community not found'], 404);
        return new CommunityResource($community);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Community $community)
    {
        $community-> update([
            'title'=> $request->title,
            'body'=> $request->body,
        ]);
        return new CommunityResource($community);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        $community->delete();
        return response()->noContent();
    }
}