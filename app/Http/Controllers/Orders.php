<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
class Orders extends Controller
{
    public function index(Request $req)
    {
    	$order = Order::all();
    	if (count($order)>0) {
    		return view('user.order',['ord'=>$order]);
    	}
    	else
    	{
    		$req->session()->flash('msg','Empty!!');
    		return view('user.order');


    	}
    }
}
