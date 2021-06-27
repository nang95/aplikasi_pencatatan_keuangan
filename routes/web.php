<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/user')->name('user.')->namespace('Admin')->group(function(){
    Route::get('/', 'DashboardController@index')->name('/');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    //pemasukan
    Route::get('pemasukan','PemasukanController@index')->name('pemasukan');
    Route::get('pemasukan/create','PemasukanController@create')->name('pemasukan.create');
    Route::post('pemasukan','PemasukanController@store')->name('pemasukan.store');
    Route::get('pemasukan/edit/{pemasukan}','PemasukanController@edit')->name('pemasukan.edit');
    Route::put('pemasukan','PemasukanController@update')->name('pemasukan.update');
    Route::delete('pemasukan','PemasukanController@delete')->name('pemasukan.delete');
    Route::post('pemasukan/cetak','PemasukanController@cetak')->name('pemasukan.cetak');
    Route::get('pemasukan/export_excel', 'PemasukanController@export_excel')->name('pemasukan.excel');

    //pengeluaran
    Route::get('pengeluaran','PengeluaranController@index')->name('pengeluaran');
    Route::get('pengeluaran/create','PengeluaranController@create')->name('pengeluaran.create');
    Route::post('pengeluaran','PengeluaranController@store')->name('pengeluaran.store');
    Route::get('pengeluaran/edit/{pengeluaran}','PengeluaranController@edit')->name('pengeluaran.edit');
    Route::put('pengeluaran','PengeluaranController@update')->name('pengeluaran.update');
    Route::delete('pengeluaran','PengeluaranController@delete')->name('pengeluaran.delete');
    Route::get('pengeluaran/cetak','PengeluaranController@cetak')->name('pengeluaran.cetak');
    Route::get('pengeluaran/export_excel', 'PengeluaranController@export_excel')->name('pengeluaran.excel');

    //Kategori
    Route::get('category','CategoryController@index')->name('category');
    Route::get('category/create','CategoryController@create')->name('category.create');
    Route::post('category','CategoryController@store')->name('category.store');
    Route::get('category/edit/{category}','CategoryController@edit')->name('category.edit');
    Route::put('category','CategoryController@update')->name('category.update');
    Route::delete('category','CategoryController@delete')->name('category.delete');
});
