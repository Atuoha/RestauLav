<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\User;
use App\Dish;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
   
class PayPalController extends Controller
{
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        // validating form
        $request->validate([
            'address'=> 'required',
            'quantity' => 'required',
            'time' => 'required',
            'date' => 'required',
            'message' => 'required',
            'item' => 'required',
            'contact' => 'required',


        ]);

        $user = Auth::user();
        // sending to database
        $input = [
            'user_id' => $user->id,
            'message' => $request->message,
            'contact' => $request->contact,
            'address' => $request->address,
            'date' => $request->date,
            'time' => $request->time,
            'item' => $request->item,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'total_price' => $request->total_price,
        ];
        Order::create($input);



        //paypal
        $data = [];
        $data['items'] = [
            [
                'name' => $request->item,
                'price' => $request->price,
                'desc'  => $request->item,
                'qty' => $request->quantity
            ]
        ];
  
        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = $request->total_price;
  
        $provider = new ExpressCheckout;
  
        $response = $provider->setExpressCheckout($data);
  
        $response = $provider->setExpressCheckout($data, true);
  
        return redirect($response['paypal_link']);
    }
   
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        // dd('Order was cancelled.');c
        return redirect('payment/status/cancel');

    }
  
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
        $response = $provider->getExpressCheckoutDetails($request->token);
  
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            // dd('Your payment was successfully. You can create success page here.');
            return redirect('payment/status/success');
        }
  
        // dd('Something is wrong.');c
        return redirect('payment/status/failure');

    }
}
