<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Subcategory;
use App\Category;

class Medicine extends Controller
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
}
