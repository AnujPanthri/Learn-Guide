<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomUser;
use Auth;
use Hash;

class HomeController extends Controller
{
    //
    public function home(){
        return view("home");
    }
    public function login_form(){
        return view("login");
    }
    public function signup_form(){
        return view("signup");
    }

    public function signup(Request $request){
        // username and password
        $request->validate([
            "username"=>[
                "required",
                "string",
                "regex:/^[a-z][a-z0-9-]*[a-z0-9]$/",    // regex for a-z 0-9 and - in middle
                "unique:App\Models\CustomUser",     // username shouldn't exist in db
            ],
            "password"=>[
                "required",
                "string",
                "min:1",
                "max:30",
            ],
            "confirm_password"=>[
                "required",
                "string",
                "min:1",
                "max:30",
            ],
        ]);

        // check if password matchs confirm password
        \Log::info($request);
        if($request['password']!=$request['confirm_password'])
        {
            // return error
            return redirect()->back()->withErrors([
                "confirm_password"=>"confirm password doesn't match the password"
            ]);
        }
        // create user
        $user = new CustomUser();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect(route("login.form"));
    }

    public function login(Request $request){
        // username and password
        $request->validate([
            "username"=>[
                "required",
                "string",
                "regex:/^[a-z][a-z0-9-]*[a-z0-9]$/",    // regex for a-z 0-9 and - in middle
                "exists:App\Models\CustomUser",     // username should exist in db
            ],
            "password"=>[
                "required",
                "string",
                "min:1",
                "max:30",
            ],
        ]);

        // \Log::info($request);
        // login
        $user = CustomUser::where("username",$request->username)->first();

        if(!Hash::check($request->password, $user->password)){
            // password is incorrect
            Auth::guard('customuser')->logout();

            return redirect()->back()->withErrors([
                "password"=>"incorrect password"
            ]);
        }

        Auth::guard('customuser')->login($user);
        return redirect(route('dashboard'));
    }
}
