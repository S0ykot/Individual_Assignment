<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    		
    	}
    }
}
