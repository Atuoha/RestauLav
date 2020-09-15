<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimony;
use App\Dish;
use App\Category;
use App\User;
use App\Photo;



class IndexPageController extends Controller
{
    //

    public function index(){

        $testimonies = Testimony::all();
        $dishes = Dish::all();
        $categories = Category::all();
        $special_dishes = Dish::where('food_plan', 'special')->get();
        $staffs = User::where('role_id', 3)->get();
        $photos = Photo::paginate(12);

        return view('index', compact('dishes', 'categories', 'testimonies','special_dishes', 'staffs', 'photos'));
    }


    public function single_page($slug){
        $dish = Dish::where('slug', $slug)->first();
        $dishes = Dish::all();

        return view('single_food', compact('dish','dishes'));
    }
}
