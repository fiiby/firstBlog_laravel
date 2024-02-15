<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // check request cycle notes for explanations.
use \App\Models\Post;   // check request cycle notes for explanations.

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //same as select * from post in mysql
        $post = Post::all();   // eloquent way!
        return view('post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate req data
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'user_id' => 'required|exists:user,column'
        ]);
        // create a new post:
        $post = new Post;
        //Post::create($validatedData);
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->user_id = $validatedData['user_id'];
        $post->save();
        return redirect()->route('post.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate teh req data
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'user_id' => 'required'
        ]);
        // update post
        $post = Post::findOrFail($id);
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->user_id = $validatedData['user_id'];
        $post->save();

        return redirect()->route('post.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('post.index')->with('success', 'Post deleted successfully');
    }
}
