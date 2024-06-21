<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Thread;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Start of Selection
        $posts = Post::where('is_thread', true)->get();
        return view('welcome', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('create-thread', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

     
        $validatedData = $request->validate([
            'title' => 'required',
            'type' => 'required',
            'content'=> 'required',
            'tags' => 'required',
        ]);

        $threadData = [
            'title' => $validatedData['title'],
            'type' => $validatedData['type'],
            'content' => $validatedData['content'],
            'category_id' => $request->category,
            'tags' => $validatedData['tags'],
            'user_id' => auth()->user()->id,
        ];

        $thread = Thread::create($threadData);
        

        $postData = [
            'content' => $validatedData['content'],
            'user_id' => auth()->id(),
            'is_first_post' => true,
            'thread_id' => $thread->id,
        ];

        $post = Post::create($postData);
        

        return Redirect::route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $post = Thread::find($id)->posts()->where('is_first_post', true)->orderBy('created_at', 'asc')->first();
        $reply = Thread::find($id)->posts()->where('is_first_post', false)->orderBy('created_at', 'desc')->get();
        

        return view('single-thread', compact('post','reply'));
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

    public function reply(Request $request,string $id)
    {
        $post = new Post();
        $post->content = $request->input('content');
        $post->user_id = auth()->id();
        $post->thread_id = $id;
        $post->is_reply_to = $id;
        $post->is_first_post = false;
        $post->save();
        return redirect()->route('thread.show', $id);
    }
}
