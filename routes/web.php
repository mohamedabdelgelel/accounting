<?php

use Illuminate\Support\Facades\Route;

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
session_start();

Route::get('/', function () {
    return view('welcome');
});
Route::get('/product', function () {
    return view('product');
});
Route::get('/buyer', function () {
    return view('buyer');
});
Route::get('/sell', function () {
    return view('sell');
});



Route::get('admin/login','AdminController@login');
Route::post('admin/postLogin','AdminController@login');
Route::get('admin/new','AccountController@entry');
Route::post('admin/entry','AccountController@postentry');
Route::get('logout','AdminController@logout');

Route::get('admin/dashboard','AdminController@index');
Route::resource('admin/account', 'AccountController');
Route::resource('admin/main', 'MainAccountController');
Route::resource('admin/store', 'StoreController');
Route::resource('admin/supplier', 'SuppliersController');
Route::resource('admin/classification', 'ClassificationController');
Route::resource('admin/products', 'ProductsController');
Route::resource('admin/users', 'UserController');
Route::resource('admin/years', 'YearsController');
Route::resource('admin/employees', 'EmployeeController');
Route::resource('admin/branches', 'BranchesController');
Route::resource('admin/revenues', 'RevenuesController');
Route::resource('admin/expenses', 'ExpensesController');

Route::get('updateSelectCountry/{id}','RevenuesController@updateSelectCountry');

Route::get('admin/getPrice','ProductsController@getPrice');
Route::get('admin/getSell','ProductsController@getSell');
Route::get('admin/upload/products','ProductsController@upload');
Route::post('uploadProducts','ProductsController@import');

Route::resource('admin/purchase', 'PurchaseController');
Route::get('admin/getPurshaseData','PurchaseController@getPurshaseData');
Route::get('admin/getPurshaseReturn','PurchaseController@getPurshaseReturn');
Route::get('admin/getPurshaseSell','PurchaseController@getPurshaseSell');
Route::get('admin/getPurshaseSellReturn','PurchaseController@getPurshaseSellReturn');



Route::get('admin/purchaseReturn','PurchaseController@createReturn');
Route::get('admin/view/purchaseReturn','PurchaseController@viewReturn');

Route::get('admin/sell','PurchaseController@createSell');
Route::get('admin/view/sell','PurchaseController@viewSell');

Route::post('admin/sell','PurchaseController@storeSell');


Route::get('admin/sellReturn','PurchaseController@createSellReturn');
Route::get('admin/view/sellReturn','PurchaseController@viewSellReturn');

Route::post('admin/sellReturn','PurchaseController@storeSellReturn');
Route::post('admin/purchaseReturn','PurchaseController@storeReturn');

Route::delete('admin/statement/delete/{id}','AccountController@deleteStatement')->name('statement.destroy');
Route::delete('admin/purchase/delete/{id}','PurchaseController@deletepurchase')->name('purchase.destroy');

Route::get('admin/upload','AccountController@upload');
Route::get('admin/statement','AccountController@statement')->name('statement.index');
Route::get('admin/report','AccountController@report');
Route::get('admin/daily','AccountController@daily');
Route::get('admin/userTransaction/{id}','AccountController@userTransaction');
Route::get('admin/transaction/{id}','AccountController@transaction');

Route::get('search','AccountController@search');
Route::get('admin/catch','AccountController@get');
Route::get('admin/catch_view','AccountController@catch_view');

Route::post('admin/catch','AccountController@storeGet');
Route::get('admin/cashing','AccountController@cashing');
Route::get('admin/cashing_view','AccountController@cashing_view');

Route::post('admin/cache','AccountController@storeCashing');

Route::post('admin/storeCashing','AccountController@storeCashing');
Route::post('upload','AccountController@import');
Route::get('admin/review','AccountController@review');
Route::get('admin/review','AccountController@review');
Route::get('admin/filter','AccountController@filter');

Route::get('admin/deleteAttendance/{id}','EmployeeController@deleteAttendance');
Route::get('admin/editAttendance/{id}','EmployeeController@editAttendance');
Route::get('admin/createAttendance','EmployeeController@createAttendance');
Route::get('admin/attendance','EmployeeController@attendance');
Route::post('storeAttendance','EmployeeController@storeAttendance');
Route::post('updateAttendance/{id}','EmployeeController@updateAttendance');

Route::get('admin/deleteHoliday/{id}','EmployeeController@deleteHoliday');
Route::get('admin/editHoliday/{id}','EmployeeController@editHoliday');
Route::get('admin/createHoliday','EmployeeController@createHoliday');
Route::get('admin/holiday','EmployeeController@holiday');
Route::post('storeHoliday','EmployeeController@storeHoliday');
Route::post('updateHoliday/{id}','EmployeeController@updateHoliday');

Route::get('admin/deleteCount/{id}','EmployeeController@deleteCount');
Route::get('admin/editCount/{id}','EmployeeController@editCount');
Route::get('admin/createCount','EmployeeController@createCount');
Route::get('admin/count','EmployeeController@count');
Route::post('storeCount','EmployeeController@storeCount');
Route::post('updateCount/{id}','EmployeeController@updateCount');

Route::get('admin/deleteWarning/{id}','EmployeeController@deleteWarning');
Route::get('admin/editWarning/{id}','EmployeeController@editWarning');
Route::get('admin/createWarning','EmployeeController@createWarning');
Route::get('admin/warning','EmployeeController@warning');
Route::post('storeWarning','EmployeeController@storeWarning');
Route::post('updateWarning/{id}','EmployeeController@updateWarning');


Route::get('admin/deletecadditional/{id}','EmployeeController@deletecadditional');
Route::get('admin/editadditional/{id}','EmployeeController@editadditional');
Route::get('admin/createadditional','EmployeeController@createadditional');
Route::get('admin/additional','EmployeeController@additional');
Route::post('storeadditional','EmployeeController@storeadditional');
Route::post('updateadditional/{id}','EmployeeController@updateadditional');