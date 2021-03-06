<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class Signup extends Controller
{
    public function index()
    {
    	return view('signup.index');
    }
    public function signup(Request $req)
    {
    	$validate = Validator::make($req->all(), [
            'name' => 'required|max:20',
            'username' => 'required|max:10',
            'password' => 'required',
            'email' => 'required|email',
            'type' => 'required',
        ]);

    	if ($validate->fails()) {
    		return redirect('/signup')
                        ->withErrors($validate)
                        ->withInput();
    	}
    	else
    	{
    		$user = new User;
            $user->id = NULL;
            $user->fullname = $req->name;
            $user->username = $req->username;
            $user->password = $req->password;
            $user->email = $req->email;
            $user->dept_id = $req->type;

            if ($user->save()) {
                return redirect('/login')->withErrors('Login with new credential');
            }               
            else
            {
                return redirect('/signup')
                                ->withErrors('SignUp Failed');
            }
    	}
    }
}
