<?php

namespace App\Http\Controllers\Dashboard;

use Alert;
use App\Category;
use App\Events\podcastSent;
use App\Http\Requests\podcastRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Podcast;
use Illuminate\Support\Facades\Auth;

class PodcastController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $podcasts = Podcast::orderBy('published_at', 'desc')->get();
        return view('dashboard.podcasts.index', compact('podcasts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.podcasts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PodcastRequest $request)
    {
        $image = $this->uploadFile($request->file('image'));
            $attachment = $this->uploadFile($request->file('attachment'));
            $podcast = podcast::create(['user_id' => Auth::user()->id , 'title' => $request->title, 'type' => $request->type,  'description' => $request->description, 'category_id' => $request->category, 'published_at' => $request->published_at, 'image' => "$image", 'attachment' => "$attachment", 'telegram' => $request->telegram, 'body' => $request->body ]);

        // Run Telegram Event
        if ($request->published_at < \Carbon\Carbon::now()){
//            event(new podcastSent($podcast));
//            podcast::where('id', $podcast->id)->update(['notified' => 1]);
        }

        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->route('podcast.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function show(Podcast $Podcast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function edit(Podcast $Podcast)
    {
        $podcast = Podcast::find($Podcast->id);
        $categories = Category::all();
        return view('dashboard.podcasts.edit', compact('podcast', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->file('attachment') == null && $request->file('image') == null){
            $podcast = Podcast::where('id', $id)->update(['user_id' => Auth::user()->id , 'title' => $request->title,'type' => $request->type, 'description' => $request->description, 'category_id' => $request->category, 'published_at' => $request->published_at, 'telegram' => $request->telegram, 'body' => $request->body ]);
        }elseif($request->file('image') == null && $request->file('attachment') != null){
            $attachment = $this->uploadFile($request->file('attachment'));
            $podcast = Podcast::where('id', $id)->update(['user_id' => Auth::user()->id , 'title' => $request->title,'type' => $request->type,  'description' => $request->description, 'category_id' => $request->category, 'published_at' => $request->published_at, 'attachment' => "$attachment", 'telegram' => $request->telegram, 'body' => $request->body ]);
        }elseif($request->file('image') != null && $request->file('attachment') == null){
            $image = $this->uploadFile($request->file('image'));
            $podcast = Podcast::where('id', $id)->update(['user_id' => Auth::user()->id , 'title' => $request->title, 'type' => $request->type, 'description' => $request->description, 'category_id' => $request->category, 'published_at' => $request->published_at, 'image' => "$image", 'telegram' => $request->telegram, 'body' => $request->body ]);
        }elseif($request->file('image') != null && $request->file('attachment') != null){
            $image = $this->uploadFile($request->file('image'));
            $attachment = $this->uploadFile($request->file('attachment'));
            $podcast = Podcast::where('id', $id)->update(['user_id' => Auth::user()->id , 'title' => $request->title, 'type' => $request->type, 'description' => $request->description, 'category_id' => $request->category, 'published_at' => $request->published_at, 'image' => "$image",'attachment' => "$attachment", 'telegram' => $request->telegram, 'body' => $request->body ]);
        }

        // Run Telegram Event
        if ($request->published_at < \Carbon\Carbon::now()){
//            event(new podcastSent($podcast));
//            podcast::where('id', $podcast->id)->update(['notified' => 1]);
        }

        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->route('podcast.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Podcast $Podcast, Request $request)
    {
        Podcast::find($request->id)->delete();
        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->back();
    }
}
