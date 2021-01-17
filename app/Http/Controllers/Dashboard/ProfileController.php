<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $Profile
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = \Auth::user();
        return view('dashboard.profile.index', compact('user'));

    }


    public function password(Request $request, User $user)
    {
        $this->validate($request, [
            'password'=>'required|confirmed',
            'password_confirmation'=>'sometimes|required_with:password',
        ]);

        $user = User::where('id', \Auth::user()->id)->update([
            'password' => \Hash::make($request->password),
        ]);

        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->route('profile.index');
    }


    public function avatar(Request $request, User $user)
    {

        $this->validate($request, [
            'avatar'=>'required',
        ]);


        $avatar = $this->uploadFile($request->file('avatar'), false, false);
        $user = User::where('id', \Auth::user()->id)->update([
            'avatar' => $avatar,
        ]);

        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->route('profile.index');

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $Profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:50',
            'family' => 'required|min:2|max:50',
            'phoneNumber' => 'numeric|digits_between:8,15',
        ]);

        $fullName = $request->name.' '.$request->family;
        $user = User::where('id', \Auth::user()->id)->update([
            'name' => $request->name,
            'family' => $request->family,
            'fullName' => $fullName,
            'phoneNumber' => $request->phoneNumber,
        ]);

        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->route('profile.index');

    }

}
