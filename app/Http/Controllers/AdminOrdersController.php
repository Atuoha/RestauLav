<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Order;
use App\Dish;


class AdminOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::paginate(5);
        return view('accounts.admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //  $items = Dish::pluck('name', 'id')->all();
        $orders = Order::paginate(5);
        return view('accounts.admin.orders.index', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //PayPalController  is taking care of this in it's payment function
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
        $order = Order::findOrFail($id);
        $deleted_status = 'No Delete';
        return view('accounts.admin.orders.show', compact('order', 'deleted_status'));
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
        $order = Order::findOrFail($id);
        $items = Dish::all();
        return view('accounts.admin.orders.edit', compact('order', 'items'));
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
        
        if(trim($request->item) == ''){
            $input  = $request->except('item');
        }else{
            $input = $request->all();
        }
        $order = Order::findOrFail($id);
        Session::flash('ORDER_UPDATE', 'Order for '. $order->item .' has been updated successfully');
        $order->update($input);
        return redirect('admin/admin_orders');
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
        $order = Order::findOrFail($id);
        Session::flash('ORDER_DELETE', 'Order for '. $order->item .' has been deleted successfully');
        $order->delete();
        return redirect('admin/admin_orders');
    }

    public function multi_delete(Request $request){

        $orders = Order::findOrFail($request->checkbox_array);

        $action = $req->action;

        if($action == 'Delete'){
            foreach($orders as $order){
                $order->delete();
            }
    
            Session::flash('ORDER_DELETE', 'Your order(s) has been deleted');
            return redirect('admin/admin_orders');
        }else{
            foreach($orders as $order){
                $order->update($req->all());
            }
    
            Session::flash('ORDER_UPDATE', 'Order(s) has been updated successfully');
            return redirect('admin/admin_orders');
        }

      


    }
}
