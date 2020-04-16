<?php

use Illuminate\Support\Facades\Route;

Route::get('/pareceristas/create','PareceristaController@create');
Route::post('/pareceristas','PareceristaController@store');

Route::get('/convenios/create','ConvenioController@create');
Route::post('/convenios','ConvenioController@store');