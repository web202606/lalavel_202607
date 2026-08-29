<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
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
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class HtmldisplayController extends Controller
{
    //
    //検索画面表示
        public function htmlsearch(){
        return view('content/html/html_search');
        
    }
    //html登録スキル検索結果画面表示
    public function htmllist(Request $request){
        // 空を用意することで(検索結果0件で)値がなくてもエラーにならない
        $htmls = [];
        $object =new Html;
        //テーブルに値がある場合
        if (Gate::allows('admin-only')) {
            if($object->exists()) {
                $htmls = $object->where('del_flg', 0)->get()->toArray();
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
                
                $htmls = $object->wherebetween('date', [$from, $until])->where('del_flg', 0)->get()->toArray();
                
                // from 選択された場合
            } elseif (!empty($request['from'])) {
                $from = $request['from'];
                
                $htmls = $object->where('date', '>=', $from)->where('del_flg', 0)->get()->toArray();
                        
                // until 選択された場合
            } elseif (!empty($request['until'])) {
                $until = $request['until'];
                
                $htmls = $object->where('date', '<=', $until)->where('del_flg', 0)->get()->toArray();
            
                // from until 両方選択されなかった場合
            } else {
                
                $htmls = $object->where('del_flg', 0)->get()->toArray();
            }
        } else{
            if(Auth::user()->html()->exists()) {
                $htmls = Auth::user()->html()->where('del_flg', 0)->get()->toArray();
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
                
                $htmls = Auth::user()->html()->wherebetween('date', [$from, $until])->where('del_flg', 0)->get()->toArray();
                
                // from 選択された場合
            } elseif (!empty($request['from'])) {
                $from = $request['from'];
                
                $htmls = Auth::user()->html()->where('date', '>=', $from)->where('del_flg', 0)->get()->toArray();
                        
                // until 選択された場合
            } elseif (!empty($request['until'])) {
                $until = $request['until'];
                
                $htmls = Auth::user()->html()->where('date', '<=', $until)->where('del_flg', 0)->get()->toArray();
            
                // from until 両方選択されなかった場合
            } else {
                
                $htmls = Auth::user()->html()->where('del_flg', 0)->get()->toArray();
            }
        }
        return view('content/html/html_list', compact('htmls','until','from'));
    }    
    public function htmlskill(Html $html){
       
        $pointmax =30;
        $pointmin =10;
        $pointhigh = 3;
        $htmlcomment =[];
        $html_point=[];
        $html_point[1] = $html->html_structure;
        $html_point[2] = $html->html_property;
        $html_point[3] = $html->html_posision;
        $html_point[4] = $html->html_link;
        $html_point[5] = $html->html_form;
        $html_point[6] = $html->html_table;
        $html_point[7] = $html->html_path;
        $html_point[8] = $html->html_element;
        $html_point[9] = $html->html_tool;
        $html_point[10] = $html->html_web;
        $html_sum = array_sum($html_point);

        //理解が完璧でない項目のコメントを取得  
        if($html_point[1] !== $pointhigh){
            $htmlcomment[0] = '・Webサイトの仕組み';
        } 
        if($html_point[2] !== $pointhigh){
            $htmlcomment[1] = '・HTMLの属性';
        } 
        if($html_point[3] !== $pointhigh){
            $htmlcomment[2] = '・要素の配置ルール';
        }
        if($html_point[4] !== $pointhigh){
            $htmlcomment[3] = '・リンク';
        } 
        if($html_point[5] !== $pointhigh){
            $htmlcomment[4] = '・フォーム';
        } 
        if($html_point[6] !== $pointhigh){
            $htmlcomment[5] = '・テーブル';
        } 
        if($html_point[7] !== $pointhigh){
            $htmlcomment[6] = '・絶対パスと相対パス';
        } 
        if($html_point[8] !== $pointhigh){
            $htmlcomment[7] = '・ブロック要素とインライン要素';
        } 
        if($html_point[9] !== $pointhigh){
            $htmlcomment[8] = '・検証ツール';
        }
        if($html_point[10] !== $pointhigh){
            $htmlcomment[9] = '・WEBページ自作';
        } 
        //空の配列を詰める
        $htmlcommentlist = array_filter($htmlcomment); 
        return view('content/html/html_skill', [
            'point' => $html_sum,
            'comments' => $htmlcommentlist
        ]);

    }
    //編集
   public function htmledit(Html $html){
        return view('content/html/html_edit', [
            //'id' => $id,
            'result' => $html        
        ]);
    }    
    //更新
    public function htmlup(Html $html, CreateData $request){


       $html->date = Carbon::today()->format('Y-m-d');
       $html->html_structure = $request->html_structure;  
       $html->html_property = $request->html_property;
       $html->html_posision = $request->html_posision;
       $html->html_link = $request->html_link;
       $html->html_form = $request->html_form;
       $html->html_table = $request->html_table;
       $html->html_path = $request->html_path;
       $html->html_element = $request->html_element;
       $html->html_tool = $request->html_tool;
       $html->html_web = $request->html_web;
       Auth::user()->html()->save($html);
       return view('parts/update_complete');
    } 
    //物理削除
    public function htmldel(Html $html){
       $html->delete();
       return view('parts/delete_complete');
    }   
    
    //論理削除 
    public function htmldelflg(Html $html){
       $html->del_flg = true;
       Auth::user()->html()->save($html);
       return view('parts/delete_complete');
    }    

}
