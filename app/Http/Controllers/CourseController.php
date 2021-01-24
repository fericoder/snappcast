<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use Illuminate\Http\Request;
use SEO;
use App\Setting;
class CourseController extends Controller
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

        $courses = Course::where('published_at', '<',  \Carbon\Carbon::now())->orderBy('published_at', 'desc')->with('user')->paginate(10);
        $recentPosts = Course::where('published_at', '<',  \Carbon\Carbon::now())->orderBy('published_at', 'desc')->with('user')->limit(5)->get();
        $categories = Category::all();
        return view('courses.index', compact('courses', 'recentPosts', 'categories'));
    }

    public function category($category)
    {
        $courses = Course::where('published_at', '<',  \Carbon\Carbon::now())->where('category_id', $category)->orderBy('published_at', 'desc')->with('user')->paginate(10);
        $recentPosts = Course::where('published_at', '<',  \Carbon\Carbon::now())->orderBy('published_at', 'desc')->with('user')->limit(5)->get();
        $categories = Category::all();
        return view('courses.index', compact('courses', 'recentPosts', 'categories'));
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
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id, Course $course)
    {
        $course->where('slug', $course->slug)->increment('viewCount');
        $course = Course::where('slug', $course->slug)->with('user', 'category', 'comments', 'sections', 'sections.episodes')->first();
        $recentPosts = Course::where('published_at', '<',  \Carbon\Carbon::now())->orderBy('id', 'desc')->with('user')->limit(5)->get();
        $categories = Category::all();

        $settings = Setting::first();

        SEO::setTitle($course->title);
        SEO::setDescription($course->body);
        SEO::opengraph()->setUrl('http://snappcast.ir');
        SEO::setCanonical('http://snappcast.ir');
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@snappcast');


        return view('courses.show', compact('course', 'recentPosts', 'categories'));
    }



    public function id(Course $course, $id)
    {

        $course->where('id', $id)->increment('viewCount');
        $course = Course::where('id', $id)->with('user', 'category', 'comments', 'sections', 'sections.episodes')->first();
        $recentPosts = Course::where('published_at', '<',  \Carbon\Carbon::now())->orderBy('id', 'desc')->with('user')->limit(5)->get();
        $categories = Category::all();

        $settings = Setting::first();

        SEO::setTitle($course->title);
        SEO::setDescription($course->body);
        SEO::opengraph()->setUrl('http://snappcast.ir');
        SEO::setCanonical('http://snappcast.ir');
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@snappcast');


        return view('courses.show', compact('course', 'recentPosts', 'categories'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }


    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $courses = Course::search($keyword)->paginate(10);

        $recentPosts = Course::where('published_at', '<',  \Carbon\Carbon::now())->orderBy('published_at', 'desc')->with('user')->limit(5)->get();
        $categories = Category::all();
        return view('courses.index', compact('courses', 'recentPosts', 'categories'));
    }

}
