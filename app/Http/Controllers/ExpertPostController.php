<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Thread;
use App\Models\Category;
use Illuminate\Http\Request;

class ExpertPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('is_thread', true)
            ->whereHas('details', function ($query) {
                $query->where('expert_id', auth()->id());
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('expert.home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $users = User::role('expert')->get();
        return view('create-thread', compact('category', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        $thread = $post->where('is_thread', true)->orderBy('created_at', 'asc')->first();

        $reply = Post::where('is_reply_to', $id)->orderBy('created_at', 'desc')->get();

        return view('expert.post.single-thread', compact('post', 'reply'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $thread = Thread::find($id);

        // return view('thread.create', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function reply(Request $request, string $id)
    {
        $reply = new Post();
        $reply->content = $request->input('content');
        $reply->user_id = auth()->id();
        $reply->is_reply_to = $id;
        $reply->is_thread = false;
        $reply->save();
        return redirect()->route('expert.thread.show', $id);
    }
}
