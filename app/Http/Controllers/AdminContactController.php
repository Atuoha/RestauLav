<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contacts = Contact::paginate(5);
        return view('accounts.admin.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('accounts.user.contact.create');
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
            'subject'=> 'required',
            'message'=> 'required',
        ]);

        $user = Auth::user();
        $input = [
            'user_id'=> $user->id,
            'subject'=> $request->subject,
            'message'=> $request->message,
        ];

        Contact::create($input);
        Session::flash('CONTACT_CREATE', 'Your contact with subject of '. $request->subject.' has been created');
        return redirect('admin/admin_contact');

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
        $contact = Contact::findOrFail($id);
        return view('accounts.admin.contact.show', compact('contact'));

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
        $contact = Contact::findOrFail($id);
        return view('accounts.admin.contact.edit', compact('contact'));
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
        $contact = Contact::findOrFail($id);
        Session::flash('CONTACT_UPDATE', 'Contact with subject of '. $contact->subject.' has been updated');
        $contact->update($request->all());
        return redirect('admin/admin_contact');
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
        $contact = Contact::findOrFail($id);
        Session::flash('CONTACT_DELETE', 'Contact with subject of '. $contact->subject.' has been deleted');
        $contact->delete();
        return redirect('admin/admin_contact');
    }


    public function multi_delete(Request $request){

        $contacts = Contact::findOrFail($request->checkbox_array);

        foreach($contacts as $contact){
            $contact->delete();
        }

        Session::flash('CONTACT_DELETE', 'Your contact(s) has been deleted');
        return redirect('admin/admin_contact');


    }
}
