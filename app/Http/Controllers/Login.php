<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class Login extends Controller
{
    public function index(Request $req)
    {
        if ($req->session()->has('password') AND $req->session()->get('type')=='1') {
            return redirect('/admin');
        }
        elseif ($req->session()->has('password') AND $req->session()->get('type')=='2') {
            return redirect('/user');
        }
    	else
        {
            return view('login.index');
        }
    }
    public function verify(Request $req)
    {
    	$validate = Validator::make($req->all(), [
            'username' => 'required|max:255',
            'password' => 'required',
        ]);

    	if ($validate->fails()) {
    		return redirect('/login')
                        ->withErrors($validate)
                        ->withInput();
    	}
    	else
    	{
    		$check = User::where('username',$req->username)
    						->where('password',$req->password)->first();
    		if (count($check)==1) {
    			if ($check->toArray()['dept_id']=='1') {
                    $req->session()->put('password', md5($req->password));
                    $req->session()->put('userid', $req->username);
                    $req->session()->put('type', $check->toArray()['dept_id']);
                    $req->session()->put('uid', $check->toArray()['uid']);
                    return redirect('/admin');

    			}
    			elseif ($check->toArray()['dept_id']=='2') {
                    $req->session()->put('password', md5($req->password));
                    $req->session()->put('userid', $req->username);
                    $req->session()->put('type', $check->toArray()['dept_id']);
                    $req->session()->put('uid', $check->toArray()['uid']);
                    return redirect('/user');
                }
    		}
    		else
    		{
    			return redirect('/login')
                        ->withErrors('Login Failed');

    		}
    	}
    }
}
