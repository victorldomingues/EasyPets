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
    return view('welcome');
});

Auth::routes();

Route::get('/manager', 'HomeController@index')->name('manager');

Route::get('/products', 'ProductsController@index')->name('products');

Route::get('/services', 'ServicesController@index')->name('services');


Route::get('/adoption', 'AdoptionFormController@index')->name('adoption');

Route::get('/adoption/pets', 'PetsController@index')->name('pets');


Route::get('/manager/colors', 'Manager\Products\ColorsController@index')->name('manager.colors');

Route::get('/manager/colors/new', 'Manager\Products\ColorsController@create')->name('manager.colors.new');

Route::post('/manager/colors/new', 'Manager\Products\ColorsController@store')->name('manager.colors.store');


Route::get('/manager/categories', 'Manager\Products\CategoriesController@index')->name('manager.categories');

Route::get('/manager/categories/new', 'Manager\Products\CategoriesController@create')->name('manager.categories.new');

Route::post('/manager/categories/new', 'Manager\Products\CategoriesController@store')->name('manager.categories.store');


