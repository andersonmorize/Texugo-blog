<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeRequest;
use App\Post;
use App\Tag;
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
        // ->orderBy('created_at', 'desc')->paginate(10);
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        $tags = Tag::all();

        return view('client.posts.index', compact('posts','tags'));
    }
    public function tagIndex($id)
    {
        $tags = Tag::all();
        $tag = Tag::find($id);
        $posts = $tag->posts()->orderBy('created_at', 'desc')->paginate(10);

        return view('client.posts.index', compact('posts', 'tags'));
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
    public function store(HomeRequest $request)
    {
        $request->validated();
        $data = $request->all();

        $search = '%'. $data['search'] .'%';

        $posts = Post::where('title', 'like', $search)
                    ->paginate(10);

        $tags = Tag::all();

        return view('client.posts.index', compact('posts','tags'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::whereSlug($slug)->first();
        $tags = Tag::all();

        return view('client.posts.show', compact('post', 'tags'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
