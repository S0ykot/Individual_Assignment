<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

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
    		$check = User::where('username',$req->username)
    						->where('password',$req->password)->first();
    		if (count($check)==1) {
    			if ($check->toArray()['dept_id']=='1') {
                    $req->session()->put('password', md5($req->uname));
                    $req->session()->put('type', $check->toArray()['dept_id']);

    			}
    			elseif ($check->toArray()['dept_id']=='2') {
                    $req->session()->put('password', md5($req->uname));
                    $req->session()->put('type', $check->toArray()['dept_id']);

                }
    		}
    		else
    		{
    			echo "Something wrong";
    		}
    	}
    }
}
