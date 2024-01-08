<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(StoreCommentRequest $request)
    {
        $comment = Comment::create([
            'body' => $request->body,
            'post_id' => $request->post_id,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @param Comment $comment
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Post $post, Comment $comment)
    {
        Gate::authorize('update', [$comment, 'admin']);

        return view('comments.edit')->with([
            'post' => $post,
            'comment' => $comment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreCommentRequest $request
     * @param Post $post
     * @param $comment
     * @return RedirectResponse
     */
    public function update(StoreCommentRequest $request, Post $post, Comment $comment)
    {
        Gate::authorize('update', [$comment, 'admin']);

        $com = $post->comments()->where('id', $comment->id)->first();

        $com->update([
            'body' => $request->body
        ]);

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @param $comment
     * @return RedirectResponse
     */
    public function destroy(Post $post, Comment $comment)
    {
        Gate::authorize('delete', [$comment, 'admin']);

        $post->comments()->where('id', $comment->id)->delete();

        return redirect()->back();
    }
}
