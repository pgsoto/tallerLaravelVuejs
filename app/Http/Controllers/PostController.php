<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();
        $channels = Channel::all();
        $posts = Post::with(['channel', 'user'])
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('post.index', compact('posts', 'channels'));
    }

    public function postChannel($slug)
    {
        try {
            $channels = Channel::all();

            $channel = Channel::where('slug', $slug)->firstOrFail(['id']);

            $posts = Post::where('channel_id', $channel->id)
                ->with(['channel', 'user'])
                ->orderBy('created_at', 'DESC')
                ->get();

            return view('post.index', compact('posts', 'channels'));
        } catch (ModelNotFoundException $ex) {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $channels = Channel::all();

        return view('post.create', compact('channels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'channel_id' => 'required'
        ]);

        Post::create($request->all());

        return response()->redirectTo('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}