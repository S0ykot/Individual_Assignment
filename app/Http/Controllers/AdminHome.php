<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdminHome extends Controller
{
    public function index()
    {
    	return view('admin.home');
    }

   	public function profile(Request $req)
   	{
   		$user = User::where('username',$req->session()->get('userid'))->first();
   		$data = $user->toArray();
   		return view('admin.profile',$data);
   	}

   	public function profileUpdate(Request $req)
   	{

   		$data =User::where('username',$req->session()->get('userid'))->first();
   		$user = User::find($data->toArray()['id']);

   		$user->fullname = $req->fullname;
   		$user->email = $req->email;

   		if ($user->save()) {
   			return redirect('/admin/profile');
   		}
   		else
   		{
   			echo "Something wrong";
   		}
   	}

}
