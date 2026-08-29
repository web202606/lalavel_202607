<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\HtmlController;
use App\Http\Controllers\CssController;
use App\Http\Controllers\JavascriptController;
use App\Http\Controllers\JqueryController;
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

Auth::routes();

Route::group(['middleware' => 'auth'], function(){


    //トップ画面表示
    Route::get('/', [DisplayController::class, 'top'])->name('top');
    
    //Html登録スキルの検索画面
    Route::get('/html_search', [HtmldisplayController::class, 'htmlsearch'])->name('html_search');
    //Html登録スキルの一覧表示
    Route::get('/html_list', [HtmldisplayController::class, 'htmllist'])->name('html_list');
    //Html登録スキルの詳細画面
    Route::get('/html_skill/{html}', [HtmldisplayController::class, 'htmlskill'])->name('html_skill');
    //Html登録スキルの編集画面
    Route::get('/html_edit/{html}', [HtmldisplayController::class, 'htmledit'])->name('html_edit');
    //Html登録スキルの更新
    Route::post('/html_up/{html}', [HtmldisplayController::class, 'htmlup'])->name('html_up');
    //Html登録スキルの削除
    Route::get('/html_del/{html}', [HtmldisplayController::class, 'htmldel'])->name('html_del');
    Route::get('/html_delflg/{html}', [HtmldisplayController::class, 'htmldelflg'])->name('html_delflg');    

    //Css登録スキルの検索画面
    Route::get('/css_search', [CssdisplayController::class, 'csssearch'])->name('css_search');
    //Html登録スキルの一覧表示
    Route::get('/css_list', [CssdisplayController::class, 'csslist'])->name('css_list');
    //Html登録スキルの詳細画面
    Route::get('/css_skill/{css}', [CssdisplayController::class, 'cssskill'])->name('css_skill');
    //Html登録スキルの編集画面
    Route::get('/css_edit/{css}', [CssdisplayController::class, 'cssedit'])->name('css_edit');
    //Html登録スキルの更新
    Route::post('/css_up/{css}', [CssdisplayController::class, 'cssup'])->name('css_up');
    //Html登録スキルの削除
    Route::get('/css_del/{css}', [CssdisplayController::class, 'cssdel'])->name('css_del');
    Route::get('/css_delflg/{css}', [CssdisplayController::class, 'cssdelflg'])->name('css_delflg');    

    //Javascript登録スキルの検索画面
    Route::get('/javascript_search', [JavascriptdisplayController::class, 'javascriptsearch'])->name('javascript_search');
    //Javascript登録スキルの一覧表示
    Route::get('/javascript_list', [JavascriptdisplayController::class, 'javascriptlist'])->name('javascript_list');
    //Javascript登録スキルの詳細画面
    Route::get('/javascript_skill/{javascript}', [JavascriptdisplayController::class, 'javascriptskill'])->name('javascript_skill');
    //Javascript登録スキルの編集画面
    Route::get('/javascript_edit/{javascript}', [JavascriptdisplayController::class, 'javascriptedit'])->name('javascript_edit');
    //Javascript登録スキルの更新
    Route::post('/javascript_up/{javascript}', [JavascriptdisplayController::class, 'javascriptup'])->name('javascript_up');
    //Javascript登録スキルの削除
    Route::get('/javascript_del/{javascript}', [JavascriptdisplayController::class, 'javascriptdel'])->name('javascript_del');
    Route::get('/javascript_delflg/{javascript}', [JavascriptdisplayController::class, 'javascriptdelflg'])->name('javascript_delflg');    

    //Jquery登録スキルの検索画面
    Route::get('/jquery_search', [JquerydisplayController::class, 'jquerysearch'])->name('jquery_search');
    //Jquery登録スキルの一覧表示
    Route::get('/jquery_list', [JquerydisplayController::class, 'jquerylist'])->name('jquery_list');
    //Jquery登録スキルの詳細画面
    Route::get('/jquery_skill/{jquery}', [JquerydisplayController::class, 'jqueryskill'])->name('jquery_skill');
    //Jquery登録スキルの編集画面
    Route::get('/jquery_edit/{jquery}', [JquerydisplayController::class, 'jqueryedit'])->name('jquery_edit');
    //Jquery登録スキルの更新
    Route::post('/jquery_up/{jquery}', [JquerydisplayController::class, 'jqueryup'])->name('jquery_up');
    //Jquery登録スキルの削除
    Route::get('/jquery_del/{jquery}', [JquerydisplayController::class, 'jquerydel'])->name('jquery_del');
    Route::get('/jquery_delflg/{jquery}', [JquerydisplayController::class, 'jquerydelflg'])->name('jquery_delflg');    

    //Php登録スキルの検索画面
    Route::get('/php_search', [PhpdisplayController::class, 'phpsearch'])->name('php_search');
    //Php登録スキルの一覧表示
    Route::get('/php_list', [PhpdisplayController::class, 'phplist'])->name('php_list');
    //Php登録スキルの詳細画面
    Route::get('/php_skill/{php}', [PhpdisplayController::class, 'phpskill'])->name('php_skill');
    //Php登録スキルの編集画面
    Route::get('/php_edit/{php}', [PhpdisplayController::class, 'phpedit'])->name('php_edit');
    //Php登録スキルの更新
    Route::post('/php_up/{php}', [PhpdisplayController::class, 'phpup'])->name('php_up');
    //Php登録スキルの削除
    Route::get('/php_del/{php}', [PhpdisplayController::class, 'phpdel'])->name('php_del');
    Route::get('/php_delflg/{php}', [PhpdisplayController::class, 'phpdelflg'])->name('php_delflg');    

    //Db登録スキルの検索画面
    Route::get('/database_search', [DbdisplayController::class, 'databasesearch'])->name('database_search');
    //Db登録スキルの一覧表示
    Route::get('/database_list', [DbdisplayController::class, 'databaselist'])->name('database_list');
    //Db登録スキルの詳細画面
    Route::get('/database_skill/{database}', [DbdisplayController::class, 'databaseskill'])->name('database_skill');
    //Db登録スキルの編集画面
    Route::get('/database_edit/{database}', [DbdisplayController::class, 'databaseedit'])->name('database_edit');
    //Db登録スキルの更新
    Route::post('/database_up/{database}', [DbdisplayController::class, 'databaseup'])->name('database_up');
    //Db登録スキルの削除
    Route::get('/database_del/{database}', [DbdisplayController::class, 'databasedel'])->name('database_del');
    Route::get('/database_delflg/{database}', [DbdisplayController::class, 'databasedelflg'])->name('database_delflg');    

    //Laravel登録スキルの検索画面
    Route::get('/laraveltbl_search', [LaraveldisplayController::class, 'laraveltblsearch'])->name('laraveltbl_search');
    //Laravel登録スキルの一覧表示
    Route::get('/laraveltbl_list', [LaraveldisplayController::class, 'laraveltbllist'])->name('laraveltbl_list');
    //Laravel登録スキルの詳細画面
    Route::get('/laraveltbl_skill/{laraveltbl}', [LaraveldisplayController::class, 'laraveltblskill'])->name('laraveltbl_skill');
    //Laravel登録スキルの編集画面
    Route::get('/laraveltbl_edit/{laraveltbl}', [LaraveldisplayController::class, 'laraveltbledit'])->name('laraveltbl_edit');
    //Laravel登録スキルの更新
    Route::post('/laraveltbl_up/{laraveltbl}', [LaraveldisplayController::class, 'laraveltblup'])->name('laraveltbl_up');
    //Laravel登録スキルの削除
    Route::get('/laraveltbl_del/{laraveltbl}', [LaraveldisplayController::class, 'laraveltbldel'])->name('laraveltbl_del');
    Route::get('/laraveltbl_delflg/{laraveltbl}', [LaraveldisplayController::class, 'laraveltbldelflg'])->name('laraveltbl_delflg');   
    
    //Skill登録スキルの検索画面
    Route::get('/skill_search', [SkilldisplayController::class, 'skillsearch'])->name('skill_search');
    //Skill登録スキルの一覧表示
    Route::get('/skill_list', [SkilldisplayController::class, 'skilllist'])->name('skill_list');
    //Skill登録スキルの詳細画面
    Route::get('/skill_skill/{skill}', [SkilldisplayController::class, 'skillskill'])->name('skill_skill');
    //Skill登録スキルの削除
    Route::get('/skill_del/{skill}', [SkilldisplayController::class, 'skilldel'])->name('skill_del');
    Route::get('/skill_delflg/{skill}', [SkilldisplayController::class, 'skilldelflg'])->name('skill_delflg');    

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

});



