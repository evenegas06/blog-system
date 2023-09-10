<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $posts = Post::where('status', 2)
            ->latest('id')
            ->paginate(8);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) {
        $similar = Post::where('category_id', $post->category_id)
            ->where('status', 2)
            ->where('id', '!=', $post->id)
            ->latest('id')
            ->take(4)
            ->get();

        return view('posts.show', [
            'post'      => $post,
            'similar'   => $similar,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    /**
     * Show posts by category.
     * 
     * @param \App\Models\Category $category
     * @return \Illuminate\Contracts\View 
     */
    public function category(Category $category) {
        $posts = Post::where('category_id', $category->id)
            ->where('status', 2)
            ->latest('id')
            ->paginate(4);

        return view('posts.category', [
            'posts'     => $posts,
            'category'  => $category
        ]);
    }

    /**
     * Show posts by tag.
     * 
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Contracts\View
     */
    public function tag(Tag $tag) {
        $posts = $tag->posts()
            ->where('status', 2)
            ->latest('id')
            ->paginate(4);

        return view('posts.tag', [
            'posts' => $posts,
            'tag'   => $tag,
        ]);
    }
}
