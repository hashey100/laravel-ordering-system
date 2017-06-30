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

Route::group(['middleware' =>'guest'], function()
{
  
Route::get('/', [
  'uses'=>'ProductController@getIndex',
  'as'=> 'index.home'
]);
});

Route::get('/product', [
  'uses'=>'ProductController@getIndex',
  'as'=> 'product.index'
]);

Route::get('/product/filter', [
  'uses'=>'ProductController@filterProducts',
  'as'=> 'product.filter'
]);

Route::post('/product/addnew', [
  'uses'=>'ProductController@addnew',
  'as'=> 'product.addnew'
]);

Route::post('/updateProd', [
  'uses'=>'ProductController@updateProd',
  'as'=> 'product.updateProd'
]);


Route::get('/add-to-cart/{id}', [
  'uses'=>'ProductController@getAddToCart',
  'as'=> 'product.addToCart'
]);

Route::get('/reduce/{id}', [
  'uses'=>'ProductController@getReduceByOne',
  'as'=> 'product.reduceByOne'
]);

Route::get('/add/{id}', [
  'uses'=>'ProductController@getAddByOne',
  'as'=> 'product.addByOne'
]);

Route::get('/remove/{id}', [
  'uses'=>'ProductController@getRemoveItem',
  'as'=> 'product.removeItem'
]);

Route::get('/checkout', [
  'uses'=>'ProductController@getCheckout',
  'as' => 'checkout'
]);

Route::get('/shopping-cart', [
  'uses'=>'ProductController@getCart',
  'as'=> 'product.shoppingCart'
]);


Route::group(['prefix' =>'user'], function()
{

  Route::group(['middleware' =>'auth'], function()
  {
    Route::get('/profile', [
      'uses'=>'UserController@getProfile',
      'as'=> 'user.profile'
    ]);

    Route::get('/profile/orders', [
      'uses'=>'UserController@getOrders',
      'as'=> 'user.yourOrders'
    ]);

    Route::get('/profile/orders/{id}', [
      'uses'=>'UserController@getorderDetails',
      'as'=> 'user.getorderDetails'
    ]);

    Route::get('/profile/orders/remakeorder/{id}', [
      'uses'=>'ProductController@remakeOrder',
      'as'=> 'product.remakeOrder'
    ]);

    Route::get('/logout', [
      'uses'=>'UserController@getLogout',
      'as'=> 'user.logout'
    ]);
  });

  Route::group(['middleware' =>'guest'], function()
  {
    Route::get('/signup', [
      'uses'=>'UserController@getSignup',
      'as'=> 'user.signup'
      ]);

    Route::post('/signup', [
      'uses'=>'UserController@postSignup',
      'as'=> 'user.signup'
      ]);

    Route::get('/signin', [
      'uses'=>'UserController@getSignin',
      'as'=> 'user.signin'
    ]);

    Route::post('/signin', [
      'uses'=>'UserController@postSignin',
      'as'=> 'user.signin'
    ]);

  });

});
