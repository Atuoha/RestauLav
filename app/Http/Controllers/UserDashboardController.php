<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reservation;
use App\Order;
use App\Testimony;
use App\Contact;


class UserDashboardController extends Controller
{
    //

    public function index(){

        $user = Auth::user()->id;
        $reservations = Reservation::where('user_id', $user)->paginate(5);
        $orders = Order::where('user_id', $user)->paginate(5);
        $testimonies = Testimony::where('user_id', $user)->get();
        $contacts = Contact::where('user_id', $user)->get();

        return view('accounts.user.index', compact('reservations', 'orders', 'testimonies', 'contacts'));
    }
}
