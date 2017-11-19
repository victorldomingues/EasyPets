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

// Store products

Route::get('/products', 'ProductsController@index')->name('products');


// Store Serviçes

Route::get('/services', 'ServicesController@index')->name('services');


// Store Adoption

Route::get('/adoption', 'AdoptionFormController@index')->name('adoption');

Route::get('/adoption/pets', 'PetsController@index')->name('pets');


// Manager

Route::get('/manager', 'HomeController@index')->name('manager');


// Manager product colors

Route::get('/manager/colors', 'Manager\Products\ColorsController@index')->name('manager.colors');

Route::get('/manager/colors/new', 'Manager\Products\ColorsController@create')->name('manager.colors.new');

Route::post('/manager/colors/store', 'Manager\Products\ColorsController@store')->name('manager.colors.store');

Route::get('/manager/colors/{id}', 'Manager\Products\ColorsController@show')->name('manager.colors.show');

Route::get('/manager/colors/{id}/edit', 'Manager\Products\ColorsController@edit')->name('manager.colors.edit');

Route::post('/manager/colors/{id}/update', 'Manager\Products\ColorsController@update')->name('manager.colors.update');

Route::post('/manager/colors/{id}/destory', 'Manager\Products\ColorsController@destroy')->name('manager.colors.destroy');


// Manager product categories

Route::get('/manager/categories', 'Manager\Products\CategoriesController@index')->name('manager.categories');

Route::get('/manager/categories/new', 'Manager\Products\CategoriesController@create')->name('manager.categories.new');

Route::post('/manager/categories/store', 'Manager\Products\CategoriesController@store')->name('manager.categories.store');




// Manager adoption