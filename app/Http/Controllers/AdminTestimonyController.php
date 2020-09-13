<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Testimony;

class AdminTestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $testimonies = Testimony::paginate(5);
        return view('accounts.admin.testimonies.index', compact('testimonies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('accounts.admin.testimonies.create');

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
        return redirect('admin/admin_testimonies');
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
        return view('accounts.admin.testimonies.show', compact('testimony'));
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
        return view('accounts.admin.testimonies.edit', compact('testimony'));
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
        Session::flash('TESTIMONY_UPDATE', 'Testimony has been updated and saved!');
        return redirect('admin/admin_testimonies');
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
        Session::flash('TESTIMONY_DELETE', 'Testimony has been deleted and removed from list!');
        return redirect('admin/admin_testimonies');
    }
}
