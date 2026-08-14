<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $htmls = [];
        // htmlテーブルに値がある場合
        /*if(Auth::user()->html()->exists()) {
            $htmls = Auth::user()->html()->where('del_flg', 0)->get()->toArray();
        }*/
        if(Html()->exists()) {
            $htmls = Html()->where('del_flg', 0)->get()->toArray();
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
            $htmls = Html()->wherebetween('date', [$from, $until])->where('del_flg', 0)->get()->toArray();
            
            // from 選択された場合
        } elseif ($request['from']) {
            $from = $request['from'];
            //$htmls = Auth::user()->html()->where('date', '>=', $from )->where('del_flg', 0)->get()->toArray();
            $htmls = Html()->where('date', '>=', $from )->where('del_flg', 0)->get()->toArray();
           
            
            // until 選択された場合
        } elseif ($request['until']) {
            $until = $request['until'];
            //$htmls = Auth::user()->html()->where('date', '<=', $until )->where('del_flg', 0)->get()->toArray();
            $htmls = Html()->where('date', '<=', $until )->where('del_flg', 0)->get()->toArray();
           
           

            // from until 両方選択されなかった場合
        } else {
            //$htmls = Auth::user()->html()->where('del_flg', 0)->get()->toArray();
            $htmls = Html()->where('del_flg', 0)->get()->toArray();
        }
        return view('content/html/html_list', compact('htmls','until','from'));
    }    

    
}
