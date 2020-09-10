<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CancelledReservations extends Controller
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
        $reservations = Reservation::onlyTrashed()->paginate(5);
        return view('accounts.user.reservations.cancelled', compact('reservations'));
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
        $reserve = Reservation::withTrashed()->findOrFail($id);
        $deleted_status = "Trashed";
        return view('accounts.user.reservations.show', compact('reserve','deleted_status'));
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
    }

    public function retrieve_cancelled($id){

       $reserve = Reservation::withTrashed()->findOrFail($id);
       $reserve->restore();
       Session::flash('RESERVATION_RETRIEVE', 'Your reservation for '.$reserve->table_number .' has been retrieved');
       return redirect('user/user_reserve');
    }

    public function terminate_cancelled($id){
        
        $reserve = Reservation::withTrashed()->findOrFail($id);
       Session::flash('RESERVATION_DELETE', 'Your reservation for '.$reserve->table_number .' has been terminated permanently');
       $reserve->forceDelete();
       return redirect('user/deleted_reserve');
    }
}
