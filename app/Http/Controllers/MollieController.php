<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;

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
            'value' => number_format($totalprice, 2), // You must send the correct number of decimals, thus we enforce the use of strings
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
        $latest = \App\Models\Order::latest()->first();
        $latest->payment = 1;
        $latest->save();
        return redirect('validation');
        //redirecten naar bedankt
    }
  
}
