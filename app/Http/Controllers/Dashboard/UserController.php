<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\UserRequest;
use App\Role;
use Illuminate\Http\Request;
use App\User;

class UserController extends \App\Http\Controllers\Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('dashboard.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $fullName = $request->name . ' ' . $request->family;
        if ($request->file('avatar') == null ){
            $user = User::create(['name' => $request->name, 'password' => bcrypt($request->password) , 'family' => $request->family,'fullName' => $fullName , 'phoneNumber' => $request->phoneNumber, 'email' => $request->email ]);
            $user->roles()->sync($request->input('role_id'));
        }else{
            $avatar = $this->uploadFile($request->file('avatar'));
            $avatar = json_encode($avatar);
            $user = User::where('id', $id)->update([ 'password' => bcrypt($request->password) ,'name' => $request->name , 'family' => $request->family,'fullName' => $fullName , 'phoneNumber' => $request->phoneNumber,  'email' => $request->email, 'avatar' => $avatar ]);
            $user->roles()->sync($request->input('role_id'));

        }


        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        $roles = Role::all();
        $user = User::find($User->id);
        return view('dashboard.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fullName = $request->name . ' ' . $request->family;
        if ($request->file('avatar') == null ){
            $user = User::where('id', $id)->update(['name' => $request->name , 'family' => $request->family,'fullName' => $fullName , 'phoneNumber' => $request->phoneNumber, 'email' => $request->email ]);
            $user = User::find($id);
            $user->roles()->sync($request->input('role_id'));
        }else{
            $avatar = $this->uploadFile($request->file('avatar'));
            $avatar = json_encode($avatar);
            $user = User::where('id', $id)->update(['name' => $request->name , 'family' => $request->family,'fullName' => $fullName , 'phoneNumber' => $request->phoneNumber, 'email' => $request->email, 'avatar' => $avatar ]);
            $user = User::find($id);
            $user->roles()->sync($request->input('role_id'));

        }

        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User, Request $request)
    {
//        User::find($request->id)->delete();
//        alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
//        return redirect()->back();
    }
}
