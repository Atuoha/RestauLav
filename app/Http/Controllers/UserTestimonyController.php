<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Testimony;

class UserTestimonyController extends Controller
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
        $testimonies = Testimony::where('user_id', $user_id)->paginate(5);
        return view('accounts.user.testimonies.index', compact('testimonies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('accounts.user.testimonies.create');

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
        $request->validate([
            'message'=> 'required',
            'job_title'=> 'required',

        ]);
        
        $user = Auth::user();

        $input = [
            'user_id' => $user->id,
            'message' => $request->message,
            'job_title' => $request->job_title
        ];

        Testimony::create($input);
        Session::flash('TESTIMONY_CREATE', 'Your testimony has been sent and saved!');
        return redirect('user/user_testimonies');
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

        $testimony = Testimony::findOrFail($id);
        return view('accounts.user.testimonies.show', compact('testimony'));
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
        $testimony = Testimony::findOrFail($id);
        return view('accounts.user.testimonies.edit', compact('testimony'));
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
            'message'=> 'required',
            'job_title'=> 'required',

        ]);
        
        Testimony::findOrFail($id)->update($request->all());
        Session::flash('TESTIMONY_UPDATE', 'Your testimony has been updated and saved!');
        return redirect('user/user_testimonies');
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
        Testimony::findOrFail($id)->delete();
        Session::flash('TESTIMONY_DELETE', 'Your testimony has been deleted and removed from list!');
        return redirect('user/user_testimonies');
    }
}
