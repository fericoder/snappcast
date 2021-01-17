<?php

namespace App\Http\Controllers\Dashboard;

use App\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // return view('dashboard.setting.index', compact('slides'));
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
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $slides = Slide::all();
        $i = 1;
        foreach ($slides as $slide) {
            $tempSlide_path = 'slide_path' . $i;
            if ($request->file($tempSlide_path) != null) {
                $slide_image = $this->uploadFile($request->file($tempSlide_path), false, true);
                $slide->slide_path = $slide_image;
            }
            $tempTitle = 'title' . $i;
            $tempDescription = 'description' . $i;
            $tempUrl = 'url' . $i;
            $tempButton_color = 'button_color' . $i;
            $slide->title = $request->$tempTitle;
            $slide->description = $request->$tempDescription;
            $slide->url = $request->$tempUrl;
            $slide->button_color = $request->$tempButton_color;
            $slide->save();
            $i++;
        }
        return redirect()->route('setting.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        //
    }
}
