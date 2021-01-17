<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Course;
use App\Post;
use App\Setting;
use Illuminate\Http\Request;
use Alert;
use SEO;
use App\Slide;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $settings = Setting::first();

        SEO::setTitle($settings->name);
        SEO::setDescription($settings->description);
        SEO::opengraph()->setUrl('http://snappcast.ir');
        SEO::setCanonical('http://snappcast.ir');
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@snappcast');

        $posts = Post::where('published_at', '<',  \Carbon\Carbon::now())->orderBy('published_at', 'desc')->take(6)->with('user')->get();
        $categories = Category::all();
        $courses = Course::where('published_at', '<',  \Carbon\Carbon::now())->orderBy('published_at', 'desc')->take(6)->with('user', 'category')->get();

        $slides = Slide::all();
        return view('index', compact('posts', 'categories','slides', 'courses'));
    }




}
