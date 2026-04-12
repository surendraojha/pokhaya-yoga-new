<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:customer', ['except' => 'logout']);
    }

    public function showForm()
    {
        return view('front.auth.login');
    }

    public function login(Request $request)
    {
        // validate the form \data_

        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:7'
        ];

        $request->validate($rules);

        // attempt to log the user in
        $login = Auth::guard('customer')->attempt(
            ['email' => $request->email, 'password' => $request->password, 'status' => '1'],
            $request->remember
        );


        if ($login) {
            return redirect()->intended(route('booking'));
        }

        $validator = Validator::make([], []);
        $validator->getMessageBag()->add('email', 'These credentials do not match our records');
        return redirect()->back()->withInput($request->only('email'))->withErrors($validator);
    }

    // logout for visitor
    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();

        return redirect()->route('job.login');
    }
}
