<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use Illuminate\Http\Request;
use SEO;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        SEO::setTitle($settings->name);
        SEO::setDescription($settings->description);
        SEO::opengraph()->setUrl('http://snappcast.ir');
        SEO::setCanonical('http://snappcast.ir');
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@snappcast');

        $posts = Post::where('published_at', '<',  \Carbon\Carbon::now())->orderBy('published_at', 'desc')->with('user')->paginate(10);
        $recentPosts = Post::where('published_at', '<',  \Carbon\Carbon::now())->orderBy('published_at', 'desc')->with('user')->limit(5)->get();
        $categories = Category::all();
        return view('posts.index', compact('posts', 'recentPosts', 'categories'));
    }

    public function category($category)
    {
        $posts = Post::where('published_at', '<',  \Carbon\Carbon::now())->where('category_id', $category)->orderBy('published_at', 'desc')->with('user')->paginate(10);
        $recentPosts = Post::where('published_at', '<',  \Carbon\Carbon::now())->orderBy('published_at', 'desc')->with('user')->limit(5)->get();
        $categories = Category::all();
        return view('posts.index', compact('posts', 'recentPosts', 'categories'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, $slug)
    {

        $post->where('slug', $slug)->increment('viewCount');
        $post = Post::where('slug', $slug)->with('user', 'category', 'comments')->first();
        $recentPosts = Post::where('published_at', '<',  \Carbon\Carbon::now())->orderBy('id', 'desc')->with('user')->limit(5)->get();
        $categories = Category::all();

        $settings = Setting::first();

        SEO::setTitle($post->title);
        SEO::setDescription($post->description);
        SEO::opengraph()->setUrl('http://snappcast.ir');
        SEO::setCanonical('http://snappcast.ir');
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@snappcast');

        return view('posts.show', compact('post', 'recentPosts', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $article)
    {
        //
    }


    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $posts = Post::search($keyword)->paginate(10);

        $recentPosts = Post::where('published_at', '<',  \Carbon\Carbon::now())->orderBy('published_at', 'desc')->with('user')->limit(5)->get();
        $categories = Category::all();
        return view('posts.index', compact('posts', 'recentPosts', 'categories'));
    }

}
