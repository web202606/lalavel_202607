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
    
    //Html登録スキルの検索画面
    Route::get('html_search', [DisplayController::class, 'htmlsearch'])->name('html_search');
    //Html登録スキルの一覧表示
    Route::get('html_list', [DisplayController::class, 'htmllist'])->name('html_list');

    //Html登録スキルの詳細画面
    Route::get('html_skill{html}', [DisplayController::class, 'htmlskill'])->name('html_skill');
    //HtmlテーブルのCRUD
    Route::resource('htmls', HtmlController::class);
    /*Route::resource('/html', 'HtmlController');*/
    Route::resource('htmls', 'HtmlController');
    //CssテーブルのCRUD
    //Route::resource('csss', CssController::class);
    Route::resource('csss', 'CssController');
    //JavascriptテーブルのCRUD
    //Route::resource('javascripts', JavascriptController::class);
    Route::resource('javascripts', 'JavascriptController');
    //JqueryテーブルのCRUD
    //Route::resource('jquerys', JqueryController::class);
    Route::resource('jquerys', 'JqueryController');
    //PhpテーブルのCRUD
    //Route::resource('phps', PhpController::class);
    Route::resource('phps', 'PhpController');
    //DatabaseテーブルのCRUD
    //Route::resource('databases', DatabaseController::class);
    Route::resource('databases', 'DatabaseController');
    //LaraveltblテーブルのCRUD
    //Route::resource('laraveltbls', LaraveltblController::class);
    Route::resource('laraveltbls', 'LaraveltblController');

    //SkillテーブルのCRUD
    //Route::resource('skills', SkillController::class);
    Route::resource('skills', 'SkillController');



