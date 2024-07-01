<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Thread;
use App\Models\Category;
use App\Models\PostDetail;
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


        $posts = Post::where('is_thread', true)->orderBy('created_at', 'desc')->get();
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

        // Start of Selection
        $validatedData = $request->validate([
            'title' => 'required',
            'type' => 'required',
            'content' => 'required',
            'tags' => 'required',
        ]);

        $postData = [
            'content' => $validatedData['content'],
            'user_id' => auth()->id(),
            'is_thread' => true,
        ];

        $post = Post::create($postData);

        $postDetailData = [
            'title' => $validatedData['title'],
            'type' => $validatedData['type'],
            'tags' => $validatedData['tags'],
            'category_id' => $request->category,
            'post_id' => $post->id,
        ];

        $postDetail = PostDetail::create($postDetailData);

        $tags = explode("\n", $validatedData['tags']);
        foreach ($tags as $tag) {
            $tag = strtolower(trim($tag));
            if (!empty($tag)) {
                Tag::create([
                    'name' => $tag,
                    'post_detail_id' => $postDetail->id,
                ]);
            }
        }

        return Redirect::route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        

        $post = Post::find($id);
        $thread = $post->where('is_thread', true)->orderBy('created_at', 'asc')->first();

        $reply = Post::where('is_reply_to', $id)->orderBy('created_at', 'desc')->get();
        

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
        $reply = new Post();
        $reply->content = $request->input('content');
        $reply->user_id = auth()->id();
        $reply->is_reply_to = $id;
        $reply->is_thread = false;
        $reply->save();
        return redirect()->route('thread.show', $id);
    }
}
