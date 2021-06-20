<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Dish;
use Mollie\Laravel\Facades\Mollie;
use Mail;

class MollieController extends Controller
{
    public function  __construct() {
        Mollie::api()->setApiKey('test_FbVACj7UbsdkHtAUWnCnmSNGFWMuuA'); // your mollie test api key
    }

    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function preparePayment()
    {   
        $payment = Mollie::api()->payments()->create([
        'amount' => [
            'currency' => 'EUR', // Type of currency you want to send
            'value' => number_format(session()->get('totalprice'), 2), // You must send the correct number of decimals, thus we enforce the use of strings
        ],
        'description' => 'Bestelling bij Foodify', 
        'redirectUrl' => route('payment.success'), // after the payment completion where you to redirect
        ]);
    
        $payment = Mollie::api()->payments()->get($payment->id);
    
        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    /**
     * Page redirection after the successfull payment
     *
     * @return Response
     */
    public function paymentSuccess() {
        //echo 'Wij hebben jouw betaling ontvangen';
        $latest = Order::with('type', 'city','hour')->latest()->first();
        $latest->payment = 1;
        $latest->save();
        $dishes = Dish::find(session('dishes'));

        Mail::send('mails.orderok', compact('latest', 'dishes'), function($message){
            $message->to('info@foodify.com')
            ->subject('Bestelling');
        });
        session()->flush();
        return redirect('validation');
        //redirecten naar bedankt
    }
  
}
