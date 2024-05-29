<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-thread');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'type' => ['required'],
            'content'=> ['required'],
            'tags' => ['required'],
        ]);

        Thread::create([
            'title' => $request->title,
            'type' => $request->type,
            'content' => $request->content,
            'tags' => $request->tags,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
            'thread_id' => $request->thread_id,
        ]);

        return Redirect::route('welcome');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $thread = Thread::find($id);

        return view('thread.create', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $thread = Thread::find($id);
        $thread->title = $request->title;
        $thread->type = $request->type;
        $thread->content = $request->content;
        $thread->tags = $request->tags;
        
        $thread->save();

        return redirect(route('welcome'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $thread = Thread::find($id);
        $thread->delete();

        return redirect(route('welcome'));
    }
}
