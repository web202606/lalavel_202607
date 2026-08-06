<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\HtmlController;
use App\Http\Controllers\CssController;
use App\Http\Controllers\JavascriptController;
use App\Http\Controllers\PhpController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\LaraveltblController;
use App\Http\Controllers\SkillController;

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

    //トップ画面表示
    Route::get('/', [DisplayController::class, 'top']);
    //HtmlテーブルのCRUD
    Route::resource('htmls', HtmlController::class);
    //CssテーブルのCRUD
    Route::resource('csss', CssController::class);
    //JavascriptテーブルのCRUD
    Route::resource('javascripts', JavascriptController::class);
    //JqueryテーブルのCRUD
    Route::resource('jquerys', JqueryController::class);
    //PhpテーブルのCRUD
    Route::resource('phps', PhpController::class);
    //DatabaseテーブルのCRUD
    Route::resource('databases', DatabaseController::class);
    //LaraveltblテーブルのCRUD
    Route::resource('laraveltbls', LaraveltblController::class);

    //SkillテーブルのCRUD
    Route::resource('skills', SkillController::class);
