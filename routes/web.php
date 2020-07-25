<?php

Auth::routes();

Route::get('beneficiaries', 'BeneficiaryController@index')->name('beneficiaries.index');
Route::get('beneficiaries/create', 'BeneficiaryController@create');
Route::post('beneficiaries', 'BeneficiaryController@store');

Route::get('/home', 'HomeController@index')->name('home');