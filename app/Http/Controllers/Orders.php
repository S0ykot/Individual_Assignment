<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;

class Orders extends Controller
{
    public function index(Request $req)
    {
    	$order = Order::where('uid',$req->session()->get('uid'))->get();
    	if (count($order)>0) {
    		return view('user.order',['ord'=>$order]);
    	}
    	else
    	{
    		$req->session()->flash('msg','Empty!!');
    		return view('user.order');

    	}
    }

    public function orderView(Request $req)
    {
        $order = Order::where('status',"0")->get();

        if (count($order)>0) {
             return view('admin.order',['ord'=>$order]);
        }
        else
        {
            $req->session()->flash('msg','Empty!!');
                return view('admin.order');
        }
    }

    public function report(Request $req)
    {
        $order = Order::where('status',"1")->get();

        if (count($order)>0) {
             return view('admin.report',['ord'=>$order]);
        }
        else
        {
            $req->session()->flash('msg','Empty!!');
                return view('admin.report');
        }
    }

    public function approve($id)
    {
        $order  = Order::find($id);
        $order->status = 1;
        if ($order->save()) {
            return redirect('/admin/orders')
                        ->withErrors("Order approved");
        }
        else
        {
            return redirect('/admin/orders')
                        ->withErrors("Order not approved");
        }
    }
}
