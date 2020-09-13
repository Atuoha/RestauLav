<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reservation;
use App\Order;
use App\Testimony;
use App\Contact;


class AdminDashboardController extends Controller
{
    //

    public function index(){

        $reservations = Reservation::paginate(5);
        $orders = Order::paginate(5);
        $testimonies = Testimony::all();
        $contacts = Contact::all();

        return view('accounts.admin.index', compact('reservations', 'orders', 'testimonies', 'contacts'));
    }
}