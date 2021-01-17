<?php

namespace App\Http\Controllers;

use App\User;
use App\Teacher;
use App\Category;
use Illuminate\Http\Request;
use App\Course;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $teachers = User::Where('type','teacher')->get();
        return view('teachers.index',compact('categories','teachers'));    
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $categories = Category::all();
        $teacher = Teacher::where('user_id',$user_id)->get()->first();
        $course = Course::where('user_id',$user_id)->get()->first();
        $courses = Course::where('user_id',$user_id)->get();
        $courseCount = Course::where('user_id',$user_id)->get()->count();
        return view('teachers.show',compact('categories','teacher','course','courseCount','courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
