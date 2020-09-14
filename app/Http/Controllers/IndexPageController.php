<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimony;
use App\Dish;
use App\Category;


class IndexPageController extends Controller
{
    //

    public function index(){

        $testimonies = Testimony::all();
        $dishes = Dish::all();
        $categories = Category::all();
        $special_dishes = Dishes::where('food_plan', 'special')->get();



        return view('index', compact('dishes', 'categories', 'testimonies','special_dishes'));
    }
}
