<?php

namespace App\Http\Controllers\Dashboard;

use App\CourseRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course_requests = CourseRequest::all();
        return view('dashboard.course_request.index', compact('course_requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $courseRequest = new CourseRequest;
        $courseRequest->user_id =  Auth::user()->id;
        $courseRequest->category_id = $request->category_id;
        $courseRequest->body = $request->body;
        $courseRequest->save();
        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseRequest  $courseRequest
     * @return \Illuminate\Http\Response
     */
    public function show(CourseRequest $courseRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseRequest  $courseRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseRequest $courseRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseRequest  $courseRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseRequest $courseRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseRequest  $courseRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CourseRequest::destroy($id);
        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->route('course_request.index');    }
}
