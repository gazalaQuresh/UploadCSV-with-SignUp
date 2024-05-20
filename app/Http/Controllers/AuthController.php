<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Ensure you have a User model
use DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
         //login form
        return view('Login');
    }

    public function showSignUpForm()
    {
        //sign up form 
        return view('SignUp');
    }

    public function register(Request $request)
    {

        //user registrtion
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'number' => 'required|numeric'
        ]);


        // Create the user

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->number = $request->number;
        $user->password = bcrypt($request->password);

        if ($user->save()) {

            return redirect(route("Login"))
                ->with('status', 'You are registered and logged in!');
        }

        return redirect(route("SignUp"))
            ->with('error', 'Error!');
    }



    public function login(Request $request)
    {

        //login User
        // Validate the request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect(route("uploaded.data"))
                ->with("success", "redirect");; // Redirect to a secure area
        }

        // Authentication failed
        return back()->withErrors([
            'login_password' => 'The provided credentials do not match our records.'
        ]);
    }

}
