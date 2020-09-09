<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRegisterRequest;
use App\User;
use App\Role;
use App\Photo;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::paginate(5);
        return view('accounts.admin.admins.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role = Role::pluck('name','id')->all();
        return view('accounts.admin.admins.create', compact('role'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRegisterRequest $request)
    {
        //
        $input = $request->all();

        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $photo = Photo::create(['name'=> $name]);
            $file->move('images', $name);
            $input['photo_id'] = $photo->id;
        }
        
        $input['password'] = Hash::make($request->password);
        User::create($input);

        Session::flash('USER_CREATE', 'A new User has been created | '. $input['name'] .' |');
        return redirect('/admin/users');
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

        $user = User::findOrFail($id);

        return view('accounts.admin.admins.show', compact('user') );
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

        return view('accounts.admin.admins.edit', compact('user', 'role') );
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

        // validation
        $request->validate([

            'name'=> 'bail | required | min:10',
            'email'=> 'required',
            'role_id'=> 'required',
        ]);
        
        // pulling user
        $user = User::findOrFail($id);
        
        //hashing password if exists
        if(trim($request->password) == ''){
            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = Hash::make($request->password);
        }

        // saving file and linking it input if it exists
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $photo = Photo::create(['name'=>$name]);
            $file->move('images',$name);  //Moving photo 

            if($user->photo != ''){
                unlink(public_path().$user->photo->name);  //Deleting old photo
            }

            $input['photo_id'] = $photo->id;
        }

        
        // session flash
        Session::flash('USER_UPDATE', 'Profile update for '. $user->name .' was successfully changed to '. $input['name'] .'');

        // updating user
        $user->update($input);

        //redirect to users index page
        return redirect('/admin/users');
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
        $user = User::findOrFail($id);
        Session::flash('USER_DELETE', 'Profile that links with '. $user->name .' has been deleted successfully');

        if($user->photo != ''){
            unlink(public_path().$user->photo->name);
        }

        // Deleting User
        $user->delete();
        return redirect('/admin/users');  //redirect to users index page

    }
}
