<?php

use Illuminate\Support\Facades\Route;
use App\Subject;

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

    $subjects = Subject::all();

    return view('forms.message',[
        "subjects" => $subjects,
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/api/create_message','MessageController@store');


Route::get('/exportar/pdf','MessageController@export_pdf')->name('export_pdf');
Route::get('/exportar/excel','MessageController@export_excel')->name('export_excel');


Route::get('/list/messages','MessageController@list')->name('list_message');