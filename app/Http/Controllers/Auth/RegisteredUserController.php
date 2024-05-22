<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Payment;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;


class RegisteredUserController extends Controller
{
   
    public function create(): View
    {
        return view('auth.register');
    }

    
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    // Retrieve payment ID from the session
    $paymentId = Session::get('payment_id');

    if (!$paymentId) {
        return redirect()->back()->withErrors(['payment' => 'Payment information is missing.']);
    }

    // Create a new User instance
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->payment_id = $paymentId;

    // Save the user data into the database
    $user->save();

    // Trigger the registered event
    event(new Registered($user));

    // Log the user in
    Auth::login($user);

    // Redirect to the home page
    return redirect(RouteServiceProvider::HOME);
}

}
