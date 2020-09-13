<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reservations = Reservation::paginate(5);
        return view('accounts.admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('accounts.admin.reservations.create');
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
            'contact'=> 'required',
            'table_number'=> 'required',
            'date'=> 'required',
            'time'=> 'required',
            'message'=> 'required',
        ]);

        $user = Auth::user();
        $input = [
            'user_id'=> $user->id,
            'email'=> $user->email,
            'contact'=> $request->contact,
            'table_number'=> $request->table_number,
            'date'=> $request->date,
            'time'=> $request->time,
            'message'=> $request->message,
        ];

        Reservation::create($input);
        Session::flash('RESERVATION_CREATE', 'Your reservation for '. $request->table_number.' has been created');
        return redirect('admin/admin_reserve');
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
        $deleted_status = "No Delete";
        return view('accounts.admin.reservations.show', compact('reserve','deleted_status'));
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
        $reservation = Reservation::withTrashed()->findOrFail($id);
        return view('accounts.admin.reservations.edit', compact('reservation'));
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
       Reservation::findOrFail($id)->update( $request->all() );
       Session::flash('RESERVATION_UPDATE', 'Reservation for '. $request->table_number.' has been updated');
       return redirect('admin/admin_reserve');

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
        $reservation = Reservation::findOrFail($id);
        Session::flash('RESERVATION_UPDATE', 'Reservation for '. $reservation->table_number.' has been deleted and cancelled successfully');
        $reservation->delete();
        return redirect('admin/admin_reserve');
    }
}
