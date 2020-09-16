<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::paginate(5);
        return view('accounts.admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('accounts.admin.category.index', compact('categories'));
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
            'name'=> 'required',
        ]);
        Category::create( $request->all() );
        Session::flash('CATEGORY_CREATE', 'A new category with name: '. $request->name .' has been added');
        return redirect('/admin/categories');
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

        $category = Category::findOrFail($id);
        return view('accounts.admin.category.edit', compact('category'));

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
            'name'=> 'required'
        ]);

        Category::findOrFail($id)->update($request->all());
        Session::flash('CATEGORY_UPDATE', 'Category has been updated '. $request->name .'');

        return redirect('admin/categories');

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
        $category = Category::findOrFail($id);
        Session::flash('CATEGORY_DELETE', 'Category has been deleted - Category name: '. $category->name .'');

        $category->delete();
        return redirect('admin/categories');
    }


    public function multi_delete(Request $request){

        $categories = Category::findOrFail($request->checkbox_array);

        foreach($categories as $category){
            $category->delete();
        }

        Session::flash('CATEGORY_DELETE', 'Your category(ies) has been deleted');
        return redirect('admin/categories');


    }
}
