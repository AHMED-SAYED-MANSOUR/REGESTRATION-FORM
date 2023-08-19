<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crud;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register',[crud::class,'index']);
Route::post('add',[crud::class,'add']);

//Route::get('/sign_form/{lang}',function ($lang){},[crud::class,'index']);

@Route::get('/sign/{lang}' , function ($lang)
{
    App::setlocale($lang);

    return view('index');
});
