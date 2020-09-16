<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use App\Photo;
use App\User;
use App\Category;

use App\Http\Requests\DishRegRequest;

use Illuminate\Support\Facades\Session;


class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dishes = Dish::paginate(5);
        return view('accounts.admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id')->all();
        // $users = User::pluck('name','id')->where('role_id', '3')->all();
        $users = User::pluck('name','id')->all();
        return view('accounts.admin.dishes.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishRegRequest $request)
    {
        //
        $input = $request->all();
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $photo = Photo::create(['name'=>$name]);
            $file->move('images',$name);
            $input['photo_id'] = $photo->id;
        }

        Dish::create($input);
        Session::flash('DISH_CREATE', 'Dish has been successfully created with name of '. $input['name'] .'');
        return redirect('/admin/dishes');
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
        $dish = Dish::withTrashed()->findOrFail($id);
        $deleted_status = "No Delete";
        return view('accounts.admin.dishes.show', compact('dish', 'deleted_status'));

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
        $dish = Dish::withTrashed()->findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        // $users = User::pluck('name','id')->where('role_id', '3')->all();
        $users = User::pluck('name','id')->all();
        return view('accounts.admin.dishes.edit', compact('dish', 'users', 'categories'));
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
        // $request->validate([
        //     'name'=> 'required | min: 5',
        //     'price'=> 'required',
        //     'user_id'=> 'required',
        //     'category_id'=> 'required',
        //     'food_plan'=> 'required',
        //     'content'=> 'required',
        // ]);
        
        $dish = Dish::findOrFail($id);

        $input = $request->all();
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $photo = Photo::create(['name'=>$name]);
            $file->move('images',$name);
            $input['photo_id'] = $photo->id;

            if($dish->photo != ''){
                unlink(public_path() . $dish->photo->name);
                Photo::findOrFail($dish->photo->id);
            } 
        }

        $dish->update($input);
        Session::flash('DISH_UPDATE', 'Dish has been successfully update with name of '. $dish->name .'');
        return redirect('/admin/dishes');
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
        Dish::findOrFail($id)->delete();
        Session::flash('DISH_DELETE', 'Dish has been successfully deleted');
        return redirect('/admin/dishes');

    }

    public function multi_delete(Request $request){

        $dishes = Dish::findOrFail($request->checkbox_array);

        foreach($dishes as $dish){
            $dish->delete();
        }

        Session::flash('DISH_DELETE', 'Your dish(es) has been deleted');
        return redirect('admin/dishes');


    }

   
}
