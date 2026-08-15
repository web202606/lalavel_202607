<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Html;
use App\Css;
use App\Javascript;
use App\Jquery;
use App\Php;
use App\Database;
use App\Laraveltbl;
use App\Skill;


class DisplayController extends Controller
{
    //
    public function top(){
    //TOP画面表示
        return view('top');
        //return view('parts/header');
        
    }
    //検索画面表示
        public function htmlsearch(){
        return view('content/html/html_search');
        
    }
        public function csssearch(){
        return view('content/css/css_search');
        
    }
        public function javascriptsearch(){
        return view('content/javascript/javascript_search');
        
    }
        public function jquerysearch(){
        return view('content/jquery/jquery_search');
        
    }
        public function phpsearch(){
        return view('content/php/php_search');
        
    }
        public function dbsearch(){
        return view('content/db/db_search');
        
    }
        public function laravelsearch(){
        return view('content/laravel/laravel_search');
        
    }
        public function skillsearch(){
        return view('content/skill/skill_search');
        
    }
    //html登録スキル検索結果画面表示
    public function htmllist(Request $request){
        // 空を用意することで(検索結果0件で)値がなくてもエラーにならない
        $html = new Html;
        $htmls = [];
        // htmlテーブルに値がある場合
        /*if(Auth::user()->html()->exists()) {
            $htmls = Auth::user()->html()->where('del_flg', 0)->get()->toArray();
        }*/
        
        if($html->exists()) {
            $htmls = $html->where('del_flg', 0)->get()->toArray();
        }

        // ---------- 日付検索による支出一覧表示 ----------
        // 空で送信された時に、$fromと$untilは定義すらされていないのでエラーになってしまう。
        // そのため事前に空の文字列を定義しておく(配列だとエラーになる)
        $from = '';
        $until = '';
        
        //日付が選択されたら
        // from until 両方選択された場合
        if (!empty($request['from']) && !empty($request['until'])) {
            $from = $request['from'];
            $until = $request['until'];
            
            //$htmls = Auth::user()->html()->wherebetween('date', [$from, $until])->where('del_flg', 0)->get()->toArray();
            $htmls = $html->wherebetween('date', [$from, $until])->where('del_flg', 0)->get()->toArray();
            
            // from 選択された場合
        } elseif ($request['from']) {
            $from = $request['from'];
            //$htmls = Auth::user()->html()->where('date', '>=', $from )->where('del_flg', 0)->get()->toArray();
            $htmls = $html->where('date', '>=', $from )->where('del_flg', 0)->get()->toArray();
           
            
            // until 選択された場合
        } elseif ($request['until']) {
            $until = $request['until'];
            //$htmls = Auth::user()->html()->where('date', '<=', $until )->where('del_flg', 0)->get()->toArray();
            $htmls = $html->where('date', '<=', $until )->where('del_flg', 0)->get()->toArray();
           
           

            // from until 両方選択されなかった場合
        } else {
            //$htmls = Auth::user()->html()->where('del_flg', 0)->get()->toArray();
            $htmls = $html->where('del_flg', 0)->get()->toArray();
        }
        return view('content/html/html_list', compact('htmls','until','from'));
    }    
    public function htmlskill(Html $html){
        //$html = new Html;
        //$result = $html->find($id);
        $pointmax =30;
        $pointmin =10;
        $pointhigh = 3;
        $htmlcomment =[];
        $html_point1 = $html->html_structure;
        $html_point2 = $html->html_property;
        $html_point3 = $html->html_posision;
        $html_point4 = $html->html_link;
        $html_point5 = $html->html_form;
        $html_point6 = $html->html_table;
        $html_point7 = $html->html_path;
        $html_point8 = $html->html_element;
        $html_point9 = $html->html_tool;
        $html_point10 = $html->html_web;
        $html_sum = $html_point1 + $html_point2 + $html_point3 + $html_point4 + $html_point5 + $html_point6 + $html_point7 + $html_point8 + $html_point9 + $html_point10;

        //理解が完璧でない項目のコメントを取得  
        if($html_point1 !== $pointhigh){
            $htmlcomment[0] = '・Webサイトの仕組み';
        } 
        if($html_point2 !== $pointhigh){
            $htmlcomment[1] = '・HTMLの属性';
        } 
        if($html_point3 !== $pointhigh){
            $htmlcomment[2] = '・要素の配置ルール';
        }
        if($html_point4 !== $pointhigh){
            $htmlcomment[3] = '・リンク';
        } 
        if($html_point5 !== $pointhigh){
            $htmlcomment[4] = '・フォーム';
        } 
        if($html_point6 !== $pointhigh){
            $htmlcomment[5] = '・テーブル';
        } 
        if($html_point7 !== $pointhigh){
            $htmlcomment[6] = '・絶対パスと相対パス';
        } 
        if($html_point8 !== $pointhigh){
            $htmlcomment[7] = '・ブロック要素とインライン要素';
        } 
        if($html_point9 !== $pointhigh){
            $htmlcomment[8] = '・検証ツール';
        }
        if($html_point10 !== $pointhigh){
            $htmlcomment[9] = '・WEBページ自作';
        } 
        //空の配列を詰める
        $htmlcommentlist = array_filter($htmlcomment); 
        return view('content/html/html_skill', [
            'point' => $html_sum,
            'comments' => $htmlcommentlist
        ]);

    }
    
}
