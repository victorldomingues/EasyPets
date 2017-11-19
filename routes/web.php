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


// Manager product

Route::get('/manager/products', 'Manager\Products\ProductsController@index')->name('manager.products');

Route::get('/manager/products/new', 'Manager\Products\ProductsController@create')->name('manager.products.new');

Route::post('/manager/products/store', 'Manager\Products\ProductsController@store')->name('manager.products.store');

Route::get('/manager/products/{id}', 'Manager\Products\ProductsController@show')->name('manager.products.show');

Route::get('/manager/products/{id}/edit', 'Manager\Products\ProductsController@edit')->name('manager.products.edit');

Route::post('/manager/products/{id}/update', 'Manager\Products\ProductsController@update')->name('manager.products.update');

Route::post('/manager/products/{id}/destory', 'Manager\Products\ProductsController@destroy')->name('manager.products.destroy');


// Manager product colors

Route::get('/manager/colors', 'Manager\Products\ColorsController@index')->name('manager.colors');

Route::get('/manager/colors/new', 'Manager\Products\ColorsController@create')->name('manager.colors.new');

Route::post('/manager/colors/store', 'Manager\Products\ColorsController@store')->name('manager.colors.store');

Route::get('/manager/colors/{id}', 'Manager\Products\ColorsController@show')->name('manager.colors.show');

Route::get('/manager/colors/{id}/edit', 'Manager\Products\ColorsController@edit')->name('manager.colors.edit');

Route::post('/manager/colors/{id}/update', 'Manager\Products\ColorsController@update')->name('manager.colors.update');

Route::post('/manager/colors/{id}/destory', 'Manager\Products\ColorsController@destroy')->name('manager.colors.destroy');


// Manager product models

Route::get('/manager/models', 'Manager\Products\ModelsController@index')->name('manager.models');

Route::get('/manager/models/new', 'Manager\Products\ModelsController@create')->name('manager.models.new');

Route::post('/manager/models/store', 'Manager\Products\ModelsController@store')->name('manager.models.store');

Route::get('/manager/models/{id}', 'Manager\Products\ModelsController@show')->name('manager.models.show');

Route::get('/manager/models/{id}/edit', 'Manager\Products\ModelsController@edit')->name('manager.models.edit');

Route::post('/manager/models/{id}/update', 'Manager\Products\ModelsController@update')->name('manager.models.update');

Route::post('/manager/models/{id}/destory', 'Manager\Products\ModelsController@destroy')->name('manager.models.destroy');



// Manager product categories

Route::get('/manager/categories', 'Manager\Products\CategoriesController@index')->name('manager.categories');

Route::get('/manager/categories/new', 'Manager\Products\CategoriesController@create')->name('manager.categories.new');

Route::post('/manager/categories/store', 'Manager\Products\CategoriesController@store')->name('manager.categories.store');

Route::get('/manager/categories/{id}', 'Manager\Products\CategoriesController@show')->name('manager.categories.show');

Route::get('/manager/categories/{id}/edit', 'Manager\Products\CategoriesController@edit')->name('manager.categories.edit');

Route::post('/manager/categories/{id}/update', 'Manager\Products\CategoriesController@update')->name('manager.categories.update');

Route::post('/manager/categories/{id}/destory', 'Manager\Products\CategoriesController@destroy')->name('manager.categories.destroy');


// Manager provider

Route::get('/manager/providers', 'Manager\Providers\ProvidersController@index')->name('manager.providers');

Route::get('/manager/providers/new', 'Manager\Providers\ProvidersController@create')->name('manager.providers.new');

Route::post('/manager/providers/store', 'Manager\Providers\ProvidersController@store')->name('manager.providers.store');

Route::get('/manager/providers/{id}', 'Manager\Providers\ProvidersController@show')->name('manager.providers.show');

Route::get('/manager/providers/{id}/edit', 'Manager\Providers\ProvidersController@edit')->name('manager.providers.edit');

Route::post('/manager/providers/{id}/update', 'Manager\Providers\ProvidersController@update')->name('manager.providers.update');

Route::post('/manager/providers/{id}/destory', 'Manager\Providers\ProvidersController@destroy')->name('manager.providers.destroy');





// Manager adoption