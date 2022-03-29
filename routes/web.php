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
    $object=new \stdClass();
    $object->name='dania';
    $object->lastname='taiba';
    $object->age='23';
    $array=['dania','ali','ibrahim','tarek'];


    return view('welcome',compact('array'));///ROUTE TO VIEW
})->name('a');



Route::get('/about', function () {


    return view('about');///ROUTE TO VIEW
});
Route::namespace('Front')->group(function (){
    Route::get('us',[\App\Http\Controllers\Front\UserController::class,'UserName']);


});
Route::group(['prefix'=>'users','middleware'=>'auth'],function (){
Route::get('show',[\App\Http\Controllers\Front\UserController::class,'UserName'])  ;
Route::get('delete',[\App\Http\Controllers\Front\UserController::class,'UserName']);


});
Route::group(['namespace'=>'Adm'],function (){
    Route::get('show',[\App\Http\Controllers\Adm\testConrollers::class,'show'])->middleware('auth');
});
Route::get('login',function (){
    return 'you have to login babe!!!';
})->name('login');
Route::resource('dcon',\App\Http\Controllers\CRUDController::class);
Route::get('get',[\App\Http\Controllers\CRUDController::class,'GETiNDEX']);///ROUTE TO CONTROLLER TO VIEW

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
