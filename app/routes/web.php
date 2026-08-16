<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\HtmlController;
use App\Http\Controllers\CssController;
use App\Http\Controllers\JavascriptController;
use App\Http\Controllers\PhpController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\LaraveltblController;
use App\Http\Controllers\SkillController;

use App\Http\Controllers\HtmldisplayController;
use App\Http\Controllers\CssdisplayController;
use App\Http\Controllers\JavascriptdisplayController;
use App\Http\Controllers\JquerydisplayController;
use App\Http\Controllers\PhpdisplayController;
use App\Http\Controllers\DbdisplayController;
use App\Http\Controllers\LaraveldisplayController;
use App\Http\Controllers\SkilldisplayController;


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
    Route::get('html_search', [HtmldisplayController::class, 'htmlsearch'])->name('html_search');
    //Html登録スキルの一覧表示
    Route::get('html_list', [HtmldisplayController::class, 'htmllist'])->name('html_list');
    //Html登録スキルの詳細画面
    Route::get('html_skill{html}', [HtmldisplayController::class, 'htmlskill'])->name('html_skill');
    //Html登録スキルの編集画面
    Route::get('html_edit{html}', [HtmldisplayController::class, 'htmledit'])->name('html_edit');
    //Html登録スキルの更新
    Route::post('html_up{html}', [HtmldisplayController::class, 'htmlup'])->name('html_up');
    //Html登録スキルの削除
    Route::get('html_del{html}', [HtmldisplayController::class, 'htmldel'])->name('html_del');
    Route::get('html_delflg{html}', [HtmldisplayController::class, 'htmldelflg'])->name('html_delflg');    

    //HtmlテーブルのCRUD(新規登録)
    Route::resource('htmls', HtmlController::class);
    /*Route::resource('/html', 'HtmlController');*/
    Route::resource('htmls', 'HtmlController');
    //CssテーブルのCRUD(新規登録)
    //Route::resource('csss', CssController::class);
    Route::resource('csss', 'CssController');
    //JavascriptテーブルのCRUD(新規登録)
    //Route::resource('javascripts', JavascriptController::class);
    Route::resource('javascripts', 'JavascriptController');
    //JqueryテーブルのCRUD(新規登録)
    //Route::resource('jquerys', JqueryController::class);
    Route::resource('jquerys', 'JqueryController');
    //PhpテーブルのCRUD(新規登録)
    //Route::resource('phps', PhpController::class);
    Route::resource('phps', 'PhpController');
    //DatabaseテーブルのCRUD(新規登録)
    //Route::resource('databases', DatabaseController::class);
    Route::resource('databases', 'DatabaseController');
    //LaraveltblテーブルのCRUD(新規登録)
    //Route::resource('laraveltbls', LaraveltblController::class);
    Route::resource('laraveltbls', 'LaraveltblController');

    //SkillテーブルのCRUD(新規登録)
    //Route::resource('skills', SkillController::class);
    Route::resource('skills', 'SkillController');



