<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerAuthController extends Controller
{
    public function signup(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|min:4',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=>'customer',
        ]);

        Auth::attempt($request->only('email', 'password'));

        return redirect()->route('home');

        // return '<script>
        //             alert("Registration successfully completed!! Please login to your account"); 
        //             window.location.href="/login";
        //         </script>';
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);
        if (Auth::attempt($request->only('email', 'password')))
        {
            if (Auth::user()->role == 'customer') {
                return redirect()->route('home');;
            }
            else {
                Auth::logout();
                return redirect()->route('login');
            }
            // return redirect()->route('home');
        }
        else
        {
            return '<script type="text/javascript">
                        alert("Incorrect email or password!!"); 
                        window.history.back();
                    </script>';
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
