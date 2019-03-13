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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');



/*admin dashboard routes*/

Route::get('/','AdminController@loginPage');
Route::match(['get','post'],'/admin','AdminController@login');

Route::group(['middleware' =>['auth']], function(){
	/*admin basic routes*/
	Route::get('/admin/dashboard','AdminController@dashboard');
	Route::get('/admin/settings','AdminController@settings');

	/*pos*/
	Route::match(['get','post'],'/admin/pos','PosController@pos');
	Route::match(['get','post'],'/admin/customer-autocomplete','PosController@customer_autocomplete');
	Route::get('/admin/invoice', 'PosController@invoice');
	Route::get('/admin/invoice_list', 'PosController@invoice_list');
    Route::match(['get','post'],'/admin/view-invoice/{id}','PosController@view_invoice');



	Route::post('/admin/get_autocomplete_data', 'PosController@get_autocomplete_data');
	Route::post('/admin/get_customer_autocomplete_data', 'PosController@get_customer_autocomplete_data');
	Route::post('/admin/romove_autocomplete_customer', 'PosController@romove_autocomplete_customer');
	Route::post('/admin/update_cart', 'PosController@update_cart');
	Route::post('/admin/delete_cart', 'PosController@delete_cart');
    Route::match(['get','post'],'/admin/medicine_quick_add','PosController@medicine_quick_add');
    Route::post('/admin/add_payment', 'PosController@add_payment_type');
    Route::post('/admin/delete_payment', 'PosController@delete_payment_type');
    Route::post('/admin/order-submit', 'PosController@order_submit');
    Route::post('/admin/cancel_order', 'PosController@cancel_order');
    Route::match(['get','post'],'/admin/invoice','PosController@invoice');

	/*Customer routes*/
	Route::resource('/admin/customer', 'CustomerController');
	Route::get('/admin/get_customers_data', 'CustomerController@get_customers_data')->name('ajax.get_customers_data');
	Route::get('/admin/delete_customer/{id}','CustomerController@destroy');


	/*Medicine category routes*/
	Route::match(['get','post'],'/admin/add_category','CategoryController@add_category');
	Route::get('/admin/view_categories', 'CategoryController@view_categories');
	Route::get('/admin/get_categories_data', 'CategoryController@get_categories_data')->name('ajax.get_categories_data');
	Route::match(['get','post'],'/admin/edit_category/{id}','CategoryController@edit_category');
	Route::get('/admin/delete_category/{id}','CategoryController@delete_category');

	/*Medicine routes*/
	Route::match(['get','post'],'/admin/add_medicine','MedicineController@add_medicine');
	Route::get('/admin/view_medicines', 'MedicineController@view_medicines');
	Route::get('/admin/get_medicines_data', 'MedicineController@get_medicines_data')->name('ajax.get_medicines_data');
	Route::match(['get','post'],'/admin/edit_medicine/{id}','MedicineController@edit_medicine');
	Route::get('/admin/delete_medicine/{id}','MedicineController@delete_medicine');

	/*Expenses category routes*/
	Route::match(['get','post'],'/admin/add_cats','ExpenseCategoryController@add_expense_category');
	Route::get('/admin/view_cats', 'ExpenseCategoryController@view_expense_categories');
	Route::get('/admin/get_expense_categories_data', 'ExpenseCategoryController@get_expense_categories_data')->name('ajax.get_expense_categories_data');
	Route::match(['get','post'],'/admin/edit_expense_category/{id}','ExpenseCategoryController@edit_expense_category');
	Route::get('/admin/delete_expense_category/{id}','ExpenseCategoryController@delete_expense_category');

	/*Expenses routes*/
	Route::match(['get','post'],'/admin/add_expense','ExpenseController@add_expense');
	Route::get('/admin/view_expenses', 'ExpenseController@view_expenses');
	Route::get('/admin/get_expenses_data', 'ExpenseController@get_expenses_data')->name('ajax.get_expenses_data');
	Route::match(['get','post'],'/admin/edit_expense/{id}','ExpenseController@edit_expense');
	Route::get('/admin/delete_expense/{id}','ExpenseController@delete_expense');


	/*Staff routes*/
	Route::match(['get','post'],'/admin/add_user','StaffController@add_user');
	Route::get('/admin/view_users', 'StaffController@view_users');
	Route::match(['get','post'],'/admin/edit_user/{id}','StaffController@edit_user');
	Route::get('/admin/delete_user_image/{id}','StaffController@delete_user_image');
	Route::get('/admin/delete_user/{id}','StaffController@delete_user');

	/*user profile routes*/
	Route::get('/admin/usp', 'AdminController@user_profile');
	Route::match(['get','post'],'/admin/update_profile','AdminController@updateProfile');
});

Route::get('/logout','AdminController@logout');



