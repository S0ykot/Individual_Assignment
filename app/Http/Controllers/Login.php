<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Login extends Controller
{
    public function index()
    {
    	return view('login.index');
    }
    public function verify(Request $req)
    {
    	$validate = Validator::make($req->all(), [
            'username' => 'required|max:255',
            'password' => 'required',
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
