<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use Illuminate\Support\Facades\Session;

class DeletedDishController extends Controller
{
    //

    public function index(){
        $dishes = Dish::onlyTrashed()->paginate(5);
        return view('accounts.admin.dishes.deleted', compact('dishes'));
    }

    public function show($id)
    {
        //
        $dish = Dish::withTrashed()->findOrFail($id);
        $deleted_status = "Deleted";
        return view('accounts.admin.dishes.show', compact('dish', 'deleted_status'));

    }


    public function terminate_dishes($id){
        // permanent delete
        Dish::withTrashed()->findOrFail($id)->forceDelete();

        Session::flash('DISH_DELETE', 'Dish has been successfully deleted permanently');
        return redirect('/deleted/dishes');
    }

    public function restore_dishes($id){
        // restore deleted

        Dish::withTrashed()->findOrFail($id)->restore();

        Session::flash('DISH_RESTORE', 'Dish has been successfully restored');
        return redirect('/admin/dishes');
    }


    public function multi_action(Request $req){

        $action = $req->action;
        $dishes = Dish::findOrFail($req->checkbox_array);

        if($action == 'terminate'){
            foreach($dishes as $dish){
                $dish->forceDelete();
            }
         Session::flash('DISH_DELETE', 'Your dish(es) has been terminated permanently');
         return redirect('admin/admin_deleted_orders');
        }else{
            foreach($dishes as $dish){
                $dish->restore();
            }
         Session::flash('DISH_RESTORE', 'Your dish(es) has been retrieved');
         return redirect('admin/dishes');
        }
    }
}
