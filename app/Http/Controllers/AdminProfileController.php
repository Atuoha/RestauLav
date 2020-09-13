<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Photo;
use App\Role;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id = Auth::user()->id;
        $profile = User::findOrFail($user_id);
        return view('accounts.admin.profile.index', compact('profile'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        $role = Role::pluck('name', 'id')->all();
        return view('accounts.admin.profile.edit', compact('user','role'));

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
        //

        $request->validate([
            'name'=> 'bail | required | min:10',
            'email'=> 'required',
        ]);

        $user = User::findOrFail($id);
        if(trim($request->password) == ''){
            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = Hash::make($request->password);
        }

        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $photo = Photo::create(['name'=>$name]);

            if($user->photo != ''){
                // unlink(public_path() . $user->photo->name);
                Photo::findOrFail($user->photo->id)->delete();
            }

            $file->move('images', $name);
            $input['photo_id'] = $photo->id;
        }

        $user->update($input);
        Session::flash('USER_UPDATE', 'Profile has been successfully updated');
        return redirect('admin/admin_profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
