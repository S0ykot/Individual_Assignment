<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Subcategory;
use App\Category;
use App\Medicine;

class Medicines extends Controller
{
    public function index()
    {
    	return view('admin.medicine');
    }

    public function addCategoryView()
    {
    	$cat = Category::all();
    	return view('admin.addCategory',['cat'=>$cat]);
    }

    public function addCategory(Request $req)
    {
    	$validate = Validator::make($req->all(), [
            'catName' => 'required|max:30',
        ]);

    	if ($validate->fails()) {
    		return redirect('/admin/medicine/addCategory')
                        ->withErrors($validate)
                        ->withInput();
    	}
    	else
    	{
    		$cat = new Category;
    		$cat->cat_id = NULL;
    		$cat->cat_name = $req->catName;

    		if ($cat->save()) {
    			return redirect('/admin/medicine/addCategory')
                        ->withErrors('Category Added');
    		}
    		else
    		{
    			return redirect('/admin/medicine/addCategory')
                        ->withErrors('Category Add failed');
    		}
    	}
    }


    public function addSubCategoryView()
    {
    	$cat = Category::all();
    	return view('admin.addSubCategory',['cat'=>$cat]);
    }

    public function addSubCategory(Request $req)
    {
    	$validate = Validator::make($req->all(), [
            'SubcatName' => 'required|max:40',
            'catName' => 'required'
        ]);

    	if ($validate->fails()) {
    		return redirect('/admin/medicine/addSubCategory')
                        ->withErrors($validate)
                        ->withInput();
    	}
    	else
    	{
    		$subcat = new Subcategory;
    		$subcat->subcat_id = NULL;
    		$subcat->subcat_name = $req->SubcatName;
    		$subcat->cat_id = $req->catName;

    		if ($subcat->save()) {
    			return redirect('/admin/medicine/addSubCategory')
                        ->withErrors('SubCategory Added');
    		}
    		else
    		{
    			return redirect('/admin/medicine/addSubCategory')
                        ->withErrors('SubCategory Add failed');
    		}
    	}
    }

    public function addMedicienView()
    {	
    	$cat = Category::all();
    	$data = DB::table('medicines')
    			->join('subcategories','medicines.subcat_id','=','subcategories.subcat_id')
    			->join('categories','categories.cat_id','=','subcategories.cat_id')
    			->get();
    	return view('admin.addMedicine',['cat'=>$cat,'m'=>$data]);
    }

    public function addMedicien(Request $req)
    {	
    	
    	$validate = Validator::make($req->all(), [
            'medicinName' => 'required|max:40',
            'quantity' => 'required|numeric',
            'vendor' => 'required|max:50',
            'price' => 'required|numeric',
            'catName' => 'required|numeric',
            'subcat' => 'required|numeric',
        ]);

    	if ($validate->fails()) {
    		return redirect('/admin/medicine/addMedicine')
                        ->withErrors($validate)
                        ->withInput();
    	}
    	else
    	{
    		$med = new Medicine;

    		$med->id = NULL;
    		$med->name = $req->medicinName;
    		$med->quantity = $req->quantity;
    		$med->vendor = $req->vendor;
    		$med->price = $req->price;
    		$med->subcat_id = $req->subcat;

    		if ($med->save()) {
    			return redirect('/admin/medicine/addMedicine')
                        ->withErrors('Medicine added successfully')
                        ->withInput();
    		}
    		else
    		{
    			return redirect('/admin/medicine/addMedicine')
                        ->withErrors('Medicine doesnot added')
                        ->withInput();
    		}
    	}
    }


}
