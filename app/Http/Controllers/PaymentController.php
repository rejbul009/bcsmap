<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
  
    public function showPaymentPage()
    {
        return view('payment_page');
    }
  
   
    
    public function processPayment(Request $request)
{
    $request->validate([
        'transaction_id' => 'required|string',
        'mobile_no' => 'required|string',
    ]);

    $transactionId = $request->input('transaction_id');
    $mobileNo = $request->input('mobile_no');

    $payment = Payment::create([
        'transaction_id' => $transactionId,
        'mobile_no' => $mobileNo,
        'success' => true,
        'active' => true,
    ]);

    Session::put('payment_id', $payment->id);

   


    return redirect()->route('register');
}
    



    
   
  
}
