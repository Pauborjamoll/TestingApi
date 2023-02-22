<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        {
            return CommentResource::collection(Comment::all());
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
        $Comment= Comment::create([
            'body'=> $request->body,
        ]);
        return new CommentResource($Comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $Comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $Comment)
    {
        return new CommentResource($Comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $Comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment-> update([
            'body'=> $request->body,
        ]);
        return new CommentResource($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $Comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        return $comment->delete();
    }
    }
