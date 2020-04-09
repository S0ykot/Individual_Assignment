<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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

   		$validate = Validator::make($req->all(), [
            'fullname' => 'required|max:30',
            'password' => 'required',
            'email' => 'required|email'
        ]);

    	if ($validate->fails()) {
    		return redirect('/admin/profile')
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
   				return redirect('/admin/profile')->withErrors("Current Password not matching");
   			}
   			else
   			{
   				if ($user->save()) {
	   				return redirect('/admin/profile')->withErrors("Profile Update successfully");
		   		}
		   		else
		   		{
		   			echo "Something wrong";
		   		}
   			}

	   		
    	}
   		
   	}


   	public function userlist()
   	{
   		$data = User::all();

   		return view('admin.userlist',['details'=>$data]);
   	}

   	public function deleteUser($id)
   	{
   		$user = User::destroy($id);
   		return redirect('/admin/userlist')->withErrors("User deleted");
   	}

}
