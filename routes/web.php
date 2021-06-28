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

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','ElectronicController@index');



Route::get('electronics_product_{slug?}','ProductController@product')->name('electronic.product');

//category Routes
Route::get('electronics_category_{slug?}','CategoryController@category')->name('electronic.category');
Route::get('electronics_category_empty','CategoryController@category_empty')->name('electronic.category_empty');
Route::get('electronics_filtered_products','CategoryController@filter')->name('categoryFilter');




Route::get('electronics_gallery','ElectronicController@gallery')->name('electronic.gallery');
Route::get('electronics_faq','ElectronicController@faq')->name('electronic.faq');
Route::get('electronics_about_us','ElectronicController@about_us')->name('electronic.about_us');

Route::get('electronics_contact_us','ElectronicController@contact_us')->name('electronic.contact_us');
Route::post('electronics_contact_us_save_msg','ElectronicController@msg_contactus')->name('contactus_msg');

Route::get('electronics_error_404','ElectronicController@error_404')->name('electronic.error_404');
Route::get('electronics_comming_soon','ElectronicController@comming_soon')->name('electronic.comming_soon');

Route::get('electronics_blog','BlogController@blog')->name('electronic.blog');
Route::get('electronics_blgpost_{slug?}','BlogController@blog_post')->name('electronic.blog_post');
Route::get('electronics_typography','ElectronicController@typography')->name('electronic.typography');

Route::get('electronics_collections_{id?}','ElectronicController@collections')->name('electronic.collections');

//searchRoute
Route::get('electrionics_search','SearchController@search_items')->name('search');
Route::get('electrionics_filter_search','SearchController@search_on_filter')->name('searchOnFilter');



//Account routes

Route::get('electronics_account_create','AccountController@account_create')->name('electronic.account_create');
Route::get('electronics_account_details','AccountController@account_details')->name('electronic.account_details');
Route::get('electronics_account_address','AccountController@account_address')->name('electronic.account_address');
Route::get('electronics_account_order_history','AccountController@account_order_history')->name('electronic.account_order_history');
Route::get('electronics_account_wishlist','AccountController@account_wishlist')->name('electronic.account_wishlist');

Route::put('electronics_account_details','AccountController@update_details')->name('update_customer_details');
Route::post('electronics_add_account_address','AccountController@add_address')->name('add_customer_address');
Route::get('electronics_edit_account_address{id?}','AccountController@edit_address')->name('edit_customer_address');
Route::put('electronics_update_account_address_{id}','AccountController@update_address')->name('update_customer_address');
Route::get('electronics_delete_account_address_{id}','AccountController@destroy_address')->name('delete_customer_address');
Route::get('select_state_for_country','AccountController@select_state')->name('select_state');

//Cart Routes
Route::post('electronic_add_to_cart','CartController@add_to_cart')->name('addToCart');
Route::put('electronic_cart_update','CartController@cart_update')->name('CartUpdate');
Route::get('electronic_delete_item_from_cart_{cartId}_{inventoryId}','CartController@destroy')->name('delete_item');
Route::get('electronic_delete_cart','CartController@destroy_carts')->name('delete_carts');
Route::get('electronics_cart','CartController@cart')->name('electronic.cart');
Route::get('electronic_mini_cart','CartController@minicart_items')->name('minicart');
Route::get('update_minicart_count','CartController@update_minicart_count')->name('update_minicart_count');
Route::get('electronics_CartEmpty','CartController@cart_empty')->name('electronic.cart_empty');
Route::get('electronics_Checkout_{cart_id?}','CartController@checkout')->name('electronic.checkout');

//OrderRoutes
Route::get('add_shipping_billingAddress','OrderController@add_shipping_address');

Route::post('electronics_place_order','OrderController@place_order')->name('place_order');
Route::get('electronics_order_details_{id}','OrderController@order_details')->name('order_details');
Route::get('electronics_order_cancel{id}','OrderController@cancel_order')->name('cancel_order');
Route::get('electronics_reorder_{id}','OrderController@re_order')->name('reOrder');
Route::delete('electronics_clear_order_history','OrderController@clearOrderHistory')->name('clearOrderHistory');

//wishlist Routes
Route::post('add_to_wishlist','AccountController@add_wishlist')->name('add_wishlist');
Route::delete('remove_from_wishlist','AccountController@remove_wishlist')->name('remove_wishlist');
Route::get('count_wishlist_items','AccountController@update_wishlist_count')->name('update_wishlist_count');
