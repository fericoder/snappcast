<?php

namespace App\Http\Controllers\Dashboard;
use Alert;
use App\Category;
use App\Episode;
use App\Events\coursesent;
use App\Http\Requests\CourseRequest;
use App\Jobs\Telegram;
use App\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use Illuminate\Support\Facades\Auth;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->type == 'admin'){
            $courses = Course::orderBy('published_at', 'desc')->get();
        }else{
            $courses = Course::where('user_id', Auth::user()->id)->orderBy('published_at', 'desc')->get();
        }
        return view('dashboard.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.courses.create2', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {


        if (strlen($request->file('allEpisodes')) > 10){
            $images = $this->uploadFile($request->file('image'));
            $allEpisodes = $this->uploadFile($request->file('allEpisodes'), false, false);
            $course = Course::create(['user_id' => Auth::user()->id , 'title' => $request->title, 'description' => $request->description, 'category_id' => $request->category, 'published_at' => $request->published_at, 'images' => $images,  'type' => $request->type, 'price' => $request->price, 'body' => $request->body, 'allEpisodes' => $allEpisodes ]);

        }else{
            $images = $this->uploadFile($request->file('image'));
            $course = Course::create(['user_id' => Auth::user()->id , 'title' => $request->title, 'description' => $request->description, 'category_id' => $request->category, 'published_at' => $request->published_at, 'images' => $images,  'type' => $request->type, 'price' => $request->price, 'body' => $request->body ]);
        }

        // Run Telegram Event
        if ($request->published_at < \Carbon\Carbon::now()->toDateTimeString()){
//            $this->dispatchNow(new Telegram($coursxe));
        }

        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->route('course.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $course = Course::with('sections', 'episodes')->find($id);
        $sections = Section::with('episodes')->where('course_id', $id)->get();
        return view('dashboard.courses.show', compact('course', 'sections'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);

        //        if (! Auth::user()->can('update', $course )) {
//            alert()->error('شما مجوز مورد نظر را ندارید.', 'عدم دسترسی');
//            return redirect()->back();
//        }

        $categories = Category::all();
        return view('dashboard.courses.edit', compact('course', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->file('attachment') == null && $request->file('image') == null){
            $course = Course::where('id', $id)->update(['user_id' => Auth::user()->id , 'title' => $request->title, 'description' => $request->description, 'category_id' => $request->category, 'published_at' => $request->published_at,  'body' => $request->body , 'status' => $request->status ]);
        }elseif($request->file('image') == null && $request->file('attachment') != null){
            $attachment = $this->uploadFile($request->file('attachment'));
            $course = Course::where('id', $id)->update(['user_id' => Auth::user()->id , 'title' => $request->title, 'description' => $request->description, 'category_id' => $request->category, 'published_at' => $request->published_at, 'attachment' => "$attachment",  'body' => $request->body , 'status' => $request->status ]);
        }elseif($request->file('image') != null && $request->file('attachment') == null){
            $image = $this->uploadFile($request->file('image'));
            $course = Course::where('id', $id)->update(['user_id' => Auth::user()->id , 'title' => $request->title, 'description' => $request->description, 'category_id' => $request->category, 'published_at' => $request->published_at, 'image' => "$image",  'body' => $request->body , 'status' => $request->status ]);
        }elseif($request->file('image') != null && $request->file('attachment') != null){
            $image = $this->uploadFile($request->file('image'));
            $attachment = $this->uploadFile($request->file('attachment'));
            $course = Course::where('id', $id)->update(['user_id' => Auth::user()->id , 'title' => $request->title, 'description' => $request->description, 'category_id' => $request->category, 'published_at' => $request->published_at, 'image' => "$image",'attachment' => "$attachment",  'body' => $request->body, 'status' => $request->status  ]);
        }


        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->route('course.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Request $request)
    {

//        if (! Auth::user()->can('delete', $course )) {
//            alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
//            return redirect()->back();
//        }

        Course::find($request->id)->delete();
        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->back();
    }


    public function addSection(Request $request, Section $section)
    {
        $section = Section::create($request->except('id'));
        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->back();

    }

    public function addEpisode(Request $request, Episode $episode)
    {
        $file = $this->uploadFile($request->file('file'), false, false);
        $timeClear =  str_replace(':', '', $request->time);
        $timeClear = $this->fa_num_to_en($timeClear);
        $episode = Episode::create([
            'section_id' => $request->section_id,
            'course_id' => $request->course_id,
            'title' => $request->title,
            'fileSize' => $request->fileSize,
            'time' => $request->time,
            'timeClear' => $timeClear,
            'type' => $request->type,
            'description' => $request->description,
            'order' => $request->order,
            'file' => $file,

        ]);
        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->back();

    }

    public function sectionDestroy(Section $section, Request $request)
    {
        Section::find($request->id)->delete();
        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->back();

    }



}
