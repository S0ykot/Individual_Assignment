<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Cart;
use App\User;
use App\Medicine;
class Carts extends Controller
{
    public function index(Request $req)
    {
    	$cart = Cart::where('uid',$req->session()->get('uid'))->get();
    	if (count($cart)>0) {
    		$data = DB::table('carts')
    				->join('medicines','carts.mid','=','medicines.mid')
    				->where('uid',$req->session()->get('uid'))->get();
    		return view('user.cart',['cart'=>$data]);
    	}
    	else
    	{
    		echo "No medicine added";
    	}
    }

    public function addToCart($id,Request $req)
    {
    	$validate = Validator::make($req->all(), [
            'SelectQuantity' => 'required'
        ]);

    	if ($validate->fails()) {
    		return redirect('/details/'.$id)
                        ->withErrors($validate)
                        ->withInput();
    	}
    	else
    	{
    		$data = Medicine::where('mid',$id)->first();


    		$cart = new Cart;
    		$cart->uid = $req->session()->get('uid');
    		$cart->qntity = $req->SelectQuantity;
    		$cart->total_price = $data['price']*$req->SelectQuantity;
    		$cart->mid = $id;

    		if ($cart->save()) {
    			$med = Medicine::find($id);

    			$med->quantity = $data['quantity']-$req->SelectQuantity;

    			if ($med->save()) {
    				echo "Added";
    			}
    			else
    			{
    				echo "Something wrong";
    			}
    		}
    		else
    		{
    			echo "Added failed";
    		}

    	}
    }
}
