<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Cart;
use App\User;
use App\Medicine;
use App\Order;
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
    				return redirect('/user/cart')
                       	 		->withErrors("Medicine added");
    			}
    			else
    			{
    				return redirect('/user/cart')
                       	 		->withErrors("Medicine add failed");
    			}
    		}
    		else
    		{
    			return redirect('/user/cart')
                       	 		->withErrors("Medicine added failed");
    		}

    	}
    }

    public function cartEditView($id)
    {
    	$data = DB::table('carts')
    				->join('medicines','carts.mid','=','medicines.mid')
    				->where('id',$id)->first();

    		return view('user.cartEdit',['cart'=>$data]);
    }

    public function cartEdit(Request $req,$id)
    {
    	$validate = Validator::make($req->all(), [
            'Quantity' => 'required|numeric',
            'price' => 'numeric'
        ]);

    	if ($validate->fails()) {
    		return redirect('/user/cart/edit/'.$id)
                        ->withErrors($validate)
                        ->withInput();
    	}
    	else
    	{


    		$data = DB::table('carts')
    				->join('medicines','carts.mid','=','medicines.mid')
    				->where('id',$id)->first();

    		if ($req->Quantity>$data->quantity) {
    			return redirect('/user/cart/edit/'.$id)
                        ->withErrors(" Out of stock")
                        ->withInput();
    		}
    		else
    		{
    			$cart = Cart::find($id);
    			$medQUpdate = $req->Quantity-$cart->qntity;
    			$cart->qntity = $req->Quantity;
    			$cart->total_price = $data->price*$req->Quantity;


    			if ($cart->save()) {
    			
    				$med = Medicine::find($data->mid);
    				$med->quantity = $data->quantity - $medQUpdate;

    				if ($med->save()) {
    					return redirect('/user/cart')
                        		->withErrors(" Cart updated");
    				}
    				else
    				{
    					return redirect('/user/cart')
                        		->withErrors(" Cart update failed");
    				}

    			}
    			else
    			{
    				return redirect('/user/cart')
                        ->withErrors(" Cart update failed");
    			}

    		}

    	}
    }


    public function cartRemove($id)
    {
    	$cart = Cart::find($id);
    	$med = Medicine::find($cart['mid']);
    	$med->quantity = $med->quantity+$cart['qntity'];

    	if ($med->save()) {
    		$des = Cart::destroy($id);
    		if ($des) {
    			return redirect('/user/cart')
                        ->withErrors(" Medicine removed");
    		}
    		else
    		{
    			return redirect('/user/cart')
                        ->withErrors(" Remove failed");
    		}
    	}
    	else
    	{
    		return redirect('/user/cart')
                        ->withErrors(" Remove failed");
    	}
    }

    public function insert(Request $req)
    {
    	$cart = Cart::where('uid',$req->session()->get('uid'))->get();

    	$q = '';
    	$tc = 0;
    	for ($i=0; $i < count($cart); $i++) { 
    		 $q.=$cart[$i]['mid'].':'.$cart[$i]['qntity'].',';
    		 $tc+=$cart[$i]['total_price'];
    	}
    	

    	$order = new Order;

    	$order->order_id = NULL;
    	$order->order_date = date("Y/m/d");
    	$order->item_quantity = $q;
    	$order->total_cost = $tc;
    	$order->uid = $req->session()->get('uid');
    	$order->status = FALSE;

    	if ($order->save()) {
    		
    		$cart = Cart::where('uid',$req->session()->get('uid'))->delete();

    		if ($cart) {
    			return redirect('/users/orders')
                        ->withErrors(" Order Placed");
    		}
    		else
    		{
    			return redirect('/users/cart')
                        ->withErrors(" Order not Placed");
    		}
    	}
    	else
    	{
    		return redirect('/users/cart')
                        ->withErrors(" Order not Placed");
    	}


    }
}
