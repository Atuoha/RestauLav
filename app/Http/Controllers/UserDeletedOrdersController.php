<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserDeletedOrdersController extends Controller
{
    //
    public function index()
    {
        //
        $user_id = Auth::user()->id;
        $orders = Order::onlyTrashed()->paginate(5);
        return view('accounts.user.orders.deleted_orders', compact('orders'));
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
        $order = Order::withTrashed()->findOrFail($id);
        $deleted_status = "Trashed";
        return view('accounts.user.orders.show', compact('order','deleted_status'));
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

    public function retrieve_deleted($id){

       $order = Order::withTrashed()->findOrFail($id);
       $order->restore();
       Session::flash('ORDER_RETRIEVE', 'Your order for '.$order->item .' has been retrieved');
       return redirect('user/user_orders');
    }

    public function terminate_deleted($id){
        
        $order = Order::withTrashed()->findOrFail($id);
       Session::flash('ORDER_DELETE', 'Your order for '.$order->item .' has been terminated permanently');
       $order->forceDelete();
       return redirect('user/deleted_orders');
    }
}

