<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function()
{
	return view('home.index');
});


Route::get('/error', function()
{
	return view('error');
});


Route::get('/login', 'Login@index');
Route::post('/login', 'Login@verify');


Route::get('/signup', 'Signup@index');
Route::post('/signup', 'Signup@signup');

Route::get('/logout', 'Logout@index');

Route::get('/search/{id}','Medicines@searchMedicine');
Route::get('/details/{id}','Medicines@medDetails');

Route::group(['middleware'=>['session']], function(){


	Route::group(['middleware'=>['admin']], function(){
		Route::get('/admin', 'AdminHome@index');
		Route::get('/admin/profile', 'AdminHome@profile');
		Route::post('/admin/profile', 'AdminHome@profileUpdate');

		Route::get('/admin/userlist', 'AdminHome@userlist');
		Route::get('/admin/userlist/delete/{id}', 'AdminHome@deleteUser');

		Route::get('/admin/medicine', 'Medicines@index');
		Route::get('/admin/medicine/addCategory', 'Medicines@addCategoryView');
		Route::post('/admin/medicine/addCategory', 'Medicines@addCategory');

		Route::get('/admin/medicine/addSubCategory', 'Medicines@addSubCategoryView');
		Route::post('/admin/medicine/addSubCategory', 'Medicines@addSubCategory');

		Route::get('/admin/medicine/addMedicine', 'Medicines@addMedicienView');
		Route::post('/admin/medicine/addMedicine', 'Medicines@addMedicien');

		Route::get('/admin/get/{id}', 'AdminHome@getSubcat');


		Route::get('/admin/orders', 'Orders@orderView');
		Route::get('/admin/orders/approved/{id}', 'Orders@approve');


		Route::get('/admin/report', 'Orders@report');




	});

	Route::group(['middleware'=>['user']], function(){
		Route::get('/user','Users@index');
		Route::get('/user/cart','Users@cart');

		Route::get('/user/profile','Users@profile');
		Route::post('/user/profile','Users@profileUpdate');


		Route::get('/user/cart','Carts@index');
		Route::post('/user/cart','Carts@insert');

		Route::post('/details/{id}','Carts@addToCart');


		Route::get('/user/passwordchange','Users@passwordChangeView');
		Route::post('/user/passwordchange','Users@passwordChange');

		Route::get('/user/cart/remove/{id}','Carts@cartRemove');
		
		Route::get('/users/orders','Orders@index');

		Route::get('/user/cart/edit/{id}','Carts@cartEditView');
		Route::post('/user/cart/edit/{id}','Carts@cartEdit');


	});

	
});