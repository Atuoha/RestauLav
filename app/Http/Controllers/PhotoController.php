<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Photo;
use Illuminate\Support\Facades\Session;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $photos = Photo::paginate(4);
        return view('accounts.admin.media.index', compact('photos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $photos = Photo::all();
        return view('accounts.admin.media.index', compact('photos'));
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
            $file = $request->file('file');
            $name = time() . $file->getClientOriginalName();
            $photo = Photo::create(['name'=>$name]);
            $file->move('images', $name);

        Session::flash('MEDIA_CREATE', 'Photo(s) has been added successfully');
        return redirect('/admin/medias');
        
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
        $photo = Photo::findOrFail($id);
        unlink(public_path() . $photo->name);
        Photo::findOrFail($id)->delete();


        Session::flash('MEDIA_DELETE', 'Photo has been deleted successfully');
        return redirect('/admin/medias');
    }


    public function multi_delete(Request $request){

        $photos = Photo::findOrFail($request->checkbox_array);

        foreach($photos as $photo){
            unlink(public_path() . $photo->name);
            Photo::findOrFail($id)->delete();
        }

        Session::flash('MEDIA_DELETE', 'Your photo(s) has been deleted');
        return redirect('/admin/medias');


    }
}
