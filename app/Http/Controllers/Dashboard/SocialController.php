<?php

namespace App\Http\Controllers\Dashboard;

use App\Social;
use Illuminate\Http\Request;

class SocialController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $socials = Social::all();
        return view('dashboard.socials.index', compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.socials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->socialMedia == 'telegram'){
            $image = $this->uploadFile($request->file('image'), false, false);
            $social = Social::create(['user_id' => \Auth::user()->id, 'caption' => $request->caption, 'socialMedia' => 'telegram' , 'image' => $image, 'published_at' => $request->published_at ]);
        }

        if ($request->socialMedia == 'instagram'){
            $image = $this->uploadFile($request->file('image'), false, false);
            $social = Social::create(['user_id' => \Auth::user()->id, 'caption' => $request->caption, 'socialMedia' => 'instagram' , 'image' => $image, 'published_at' => $request->published_at ]);
        }

        if ($request->socialMedia == 'all'){
            $image = $this->uploadFile($request->file('image'), false, false);
            $social = Social::create(['user_id' => \Auth::user()->id, 'caption' => $request->caption, 'socialMedia' => 'instagram' , 'image' => $image, 'published_at' => $request->published_at ]);
            $social = Social::create(['user_id' => \Auth::user()->id, 'caption' => $request->caption, 'socialMedia' => 'telegram' , 'image' => $image, 'published_at' => $request->published_at ]);
        }


        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->route('socials.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $social
     * @return \Illuminate\Http\Response
     */
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $social
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $social = Social::find($id);
        return view('dashboard.socials.edit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Social $social)
    {

        $social->update($request->all());
        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->route('socials.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social, Request $request)
    {
        Social::find($request->id)->delete();
        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->back();
    }
}
