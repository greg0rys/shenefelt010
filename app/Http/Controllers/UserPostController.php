<?php

namespace App\Http\Controllers;

use App\Models\UserPost;
use App\Http\Requests\StoreUserPostRequest;
use App\Http\Requests\UpdateUserPostRequest;
use Illuminate\Support\Str;

class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = UserPost::with('user')        // 1. Eager load 'user' FIRST (efficient SQL)
        ->orderBy('created_at', 'desc') // 2. Sort in Database (faster than PHP)
        ->get()                    // 3. Execute query
        ->groupBy('user_id');     // 4. Group results for the view

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserPostRequest $request)
    {
        $data = $request->validated(); // extract validated data
        $post = UserPost::create($data); // create the post FIRST then use the slug() relationship

        $post->slug()
            ->create(['slug' => Str::slug($post->title, '-'), 'post_id' => $post->id]);

        return redirect()->route('posts.show', $post);

    }

    /**
     * Display the specified resource.
     */
    public function show(UserPost $post)
    {
        $post->load('slug');
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserPost $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserPostRequest $request, UserPost $post)
    {
        $post->update($request->validated());
        $post->updateSlug();

        return redirect()
            ->route('posts.show', $post)
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserPost $post)
    {
        $postId = $post->id; // quick store so we can output the id on success
        // 1. Delete the post softly
        $post->delete();

        // Redirect with success
        return redirect()
            ->route('posts.index')
            ->with('success', "Post deleted successfully. Id: $postId");
    }

    public function deletedPosts()
    {
        $posts = UserPost::onlyTrashed()
            ->get();
        return view('posts.deleted', ['posts' => $posts]);
    }
}
