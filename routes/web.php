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

Route::get('/', function () {
    return view('forms.create');
})->name('forms.create');

Route::post('/forms', 'FormController@store')->name('forms.store');

Route::delete('/forms/{form_uid}', 'FormController@destroy')->name('forms.destroy');

Route::get('/forms/{form_uid}', 'FormController@index')->name('forms.index');

Route::post('/fields/{form_uid}', 'FieldController@store')->name('fields.store');

Route::delete('/fields/{id}', 'FieldController@destroy')->name('fields.destroy');

Route::get('/answers/{form_uid}', 'AnswerController@show')->name('answers.show');

