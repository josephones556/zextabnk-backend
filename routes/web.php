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

Route::get('/', function () {
	return redirect(env('APP_FRONT_END_URL'));
});

Route::view('/about', 'about')->name('about');
Route::view('/loans', 'loans')->name('loans');

Auth::routes();

///////////////User

Route::middleware(['web', 'auth', 'admin'])->namespace('Admin')->prefix('admin')->name('admin.')->group(function()
{
	Route::get('/index', 'MainController@index')->name('index');

	Route::get('/account/{id}', 'AccountController@account')->name('account');

	Route::get('/account/alter/transaction/{id}', 'AccountController@account_alter_transaction')->name('alter.transaction');

	Route::post('/account/update/transaction/{id}', 'AccountController@account_update_transaction')->name('update.transaction');

	Route::get('/credit/{id}', 'AccountController@credit')->name('credit');

	Route::get('/debit/{id}', 'AccountController@debit')->name('debit');

	Route::post('/account/action/{id}/{type}', 'AccountController@action')->name('account.action');

    Route::get('/new/bank', 'BankController@new_bank')->name('new_bank');

    Route::post('/create/bank', 'BankController@create_bank')->name('bank.create');

    Route::get('/bank/list', 'BankController@bank_list')->name('bank_list');

	Route::view('/new/account', 'admin.new_account')->name('new_account');

	Route::post('/new/account/register', 'AccountController@new_account')->name('new.account.register');
});


/////////////////////// Account Owner

Route::middleware(['web', 'auth'])->namespace('Secure')->prefix('secure')->name('secure.')->group(function()
{
	# code...
	Route::get('/index', 'MainController@index')->name('index');

	Route::get('/cards', 'MainController@card')->name('card');

	Route::post('/card/action/', 'MainController@card_action')->name('card_action');

	Route::get('/transactions', 'MainController@transactions')->name('transactions');

	Route::get('/invoice/{reference}', 'MainController@invoice')->name('invoice');

	////////////////Profile COntroller

	Route::get('/account', 'ProfileController@account')->name('account');

	////////////////Transfer

	Route::get('/transfer', 'TransferController@transfer')->name('transfer');

	Route::post('/transfer/new', 'TransferController@transfer_new')->name('transfer.new');

    Route::post('/get/bank/detail', 'TransferController@get_bank_detail')->name('bank.get.detail');

	Route::post('/get/account/detail', 'TransferController@get_account_detail')->name('account.detail');

	/////////////////Register

	Route::get('/register', 'RegController@register')->name('register');

	Route::post('/register/new', 'RegController@register_new')->name('register.new');
});

