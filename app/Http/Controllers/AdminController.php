<?php

namespace App\Http\Controllers;

use App\Models\Payment; // Note the correct case for 'Models'
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function payment()
    {
        $payments = Payment::all(); // Corrected syntax for retrieving all payments
        return view('admin.payment', compact('payments'));
    }


    public function deletePayment($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return redirect()->back()->with('success', 'Payment deleted successfully');

    }
    

}
