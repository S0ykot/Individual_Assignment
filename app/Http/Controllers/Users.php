<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class Users extends Controller
{
    public function index()
    {
    	return view('user.home');
    }

    public function profile(Request $req)
   	{
   		$user = User::where('username',$req->session()->get('userid'))->first();
   		$data = $user->toArray();
   		return view('user.profile',$data);
   	}

   	public function profileUpdate(Request $req)
   	{

   		$validate = Validator::make($req->all(), [
            'fullname' => 'required|max:30',
            'password' => 'required',
            'email' => 'required|email'
        ]);

    	if ($validate->fails()) {
    		return redirect('/user/profile')
                        ->withErrors($validate)
                        ->withInput();
    	}

    	else
    	{
    		$data =User::where('username',$req->session()->get('userid'))->first();
   			$user = User::find($data->toArray()['id']);

   			$user->fullname = $req->fullname;
   			$user->email = $req->email;

   			if ($user->password!=$req->password) {
   				return redirect('/user/profile')->withErrors("Current Password not matching");
   			}
   			else
   			{
   				if ($user->save()) {
	   				return redirect('/user/profile')->withErrors("Profile Update successfully");
		   		}
		   		else
		   		{
		   			echo "Something wrong";
		   		}
   			}

	   		
    	}
   		
   	}

   	public function passwordChangeView(Request $req)
   	{
   		return view('user.passChange');
   	}

   	public function passwordChange(Request $req)
   	{
   		$validate = Validator::make($req->all(), [
            'currentPassword' => 'required|max:20',
            'newPassword' => 'required|max:20|same:currentNewPassword',
            'currentNewPassword' => 'required|max:20'
        ]);

        if ($validate->fails()) {
    		return redirect('/user/passwordchange')
                        ->withErrors($validate)
                        ->withInput();
    	}
    	else
    	{
    		$data =User::where('username',$req->session()->get('userid'))->first();
   			$user = User::find($data->toArray()['id']);

   			$user->password = $req->newPassword;

   			if ($user->password!=$req->newPassword) {
   				return redirect('/user/passwordchange')->withErrors("Current Password not matching");
   			}
   			else
   			{
   				if ($user->save()) {
	   				return redirect('/logout');
		   		}
		   		else
		   		{
		   			echo "Something wrong";
		   		}
   			}

	   		
    	}
   	}
}
