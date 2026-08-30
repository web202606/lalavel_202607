<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Css;
use App\Javascript;
use App\Jquery;
use App\Php;
use App\Database;
use App\Laraveltbl;
use App\Skill;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class PhpdisplayController extends Controller
{
    //
    //検索画面表示
    public function phpsearch(){
        return view('content/php/php_search');
        
    }
    //php登録スキル検索結果画面表示
    public function phplist(Request $request){
        // 空を用意することで(検索結果0件で)値がなくてもエラーにならない
        $phps = [];
        $object =new Php;
        //テーブルに値がある場合
        if (Gate::allows('admin-only')) {
            if($object->exists()) {
                $phps = $object->where('del_flg', 0)->get()->toArray();
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
                
                $phps = $object->wherebetween('date', [$from, $until])->where('del_flg', 0)->get()->toArray();
                
                // from 選択された場合
            } elseif (!empty($request['from'])) {
                $from = $request['from'];
                
                $phps = $object->where('date', '>=', $from)->where('del_flg', 0)->get()->toArray();
                        
                // until 選択された場合
            } elseif (!empty($request['until'])) {
                $until = $request['until'];
                
                $phps = $object->where('date', '<=', $until)->where('del_flg', 0)->get()->toArray();
            
                // from until 両方選択されなかった場合
            } else {
                
                $phps = $object->where('del_flg', 0)->get()->toArray();
            }
        } else{
            if(Auth::user()->php()->exists()) {
                $phps = Auth::user()->php()->where('del_flg', 0)->get()->toArray();
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
                
                $phps = Auth::user()->php()->wherebetween('date', [$from, $until])->where('del_flg', 0)->get()->toArray();
                
                // from 選択された場合
            } elseif (!empty($request['from'])) {
                $from = $request['from'];
                
                $phps = Auth::user()->php()->where('date', '>=', $from)->where('del_flg', 0)->get()->toArray();
                        
                // until 選択された場合
            } elseif (!empty($request['until'])) {
                $until = $request['until'];
                
                $phps = Auth::user()->php()->where('date', '<=', $until)->where('del_flg', 0)->get()->toArray();
            
                // from until 両方選択されなかった場合
            } else {
                
                $phps = Auth::user()->php()->where('del_flg', 0)->get()->toArray();
            }
        }
        return view('content/php/php_list', compact('phps','until','from'));
    }    
    public function phpskill(Php $php){
       
        $pointmax =30;
        $pointmin =10;
        $pointhigh = 3;
        $phpcomment =[];
        $php_point=[];
        $php_point[1] = $php->php_if;
        $php_point[2] = $php->php_array;
        $php_point[3] = $php->php_for;
        $php_point[4] = $php->php_object;
        $php_point[5] = $php->php_error;
        $php_point[6] = $php->php_get;
        $php_point[7] = $php->php_post;
        $php_point[8] = $php->php_session;
        $php_point[9] = $php->php_xss;
        $php_point[10] = $php->php_validation;
        $php_sum = array_sum($php_point);

        //理解が完璧でない項目のコメントを取得  
        if($php_point[1] !== $pointhigh){
            $phpcomment[0] = '・if文';
        } 
        if($php_point[2] !== $pointhigh){
            $phpcomment[1] = '・配列';
        } 
        if($php_point[3] !== $pointhigh){
            $phpcomment[2] = '・ループ処理';
        }
        if($php_point[4] !== $pointhigh){
            $phpcomment[3] = '・オブジェクト指向';
        } 
        if($php_point[5] !== $pointhigh){
            $phpcomment[4] = '・フォーム';
        } 
        if($php_point[6] !== $pointhigh){
            $phpcomment[5] = '・GET';
        } 
        if($php_point[7] !== $pointhigh){
            $phpcomment[6] = '・POST';
        } 
        if($php_point[8] !== $pointhigh){
            $phpcomment[7] = '・SESSION';
        } 
        if($php_point[9] !== $pointhigh){
            $phpcomment[8] = '・XSS対策';
        }
        if($php_point[10] !== $pointhigh){
            $phpcomment[9] = '・バリデーション';
        } 
        //空の配列を詰める
        $phpcommentlist = array_filter($phpcomment); 
        return view('content/php/php_skill', [
            'point' => $php_sum,
            'comments' => $phpcommentlist
        ]);

    }
    //編集
   public function phpedit(Php $php){
        return view('content/php/php_edit', [
            //'id' => $id,
            'result' => $php        
        ]);
    }    
    //更新
    public function phpup(Php $php, CreateData $request){


       $php->date = Carbon::today()->format('Y-m-d');
       $php->php_if = $request->php_if;  
       $php->php_array = $request->php_array;
       $php->php_for = $request->php_for;
       $php->php_object = $request->php_object;
       $php->php_error = $request->php_error;
       $php->php_get = $request->php_get;
       $php->php_post = $request->php_post;
       $php->php_session = $request->php_session;
       $php->php_xss = $request->php_xss;
       $php->php_validation = $request->php_validation;
       Auth::user()->php()->save($php);
       return view('parts/update_complete');
    } 
    //物理削除
    public function phpdel(Php $php){
       $php->delete();
       return view('parts/delete_complete');
    }   
    
    //論理削除 
    public function phpdelflg(Php $php){
       $php->del_flg = true;
       Auth::user()->php()->save($php);
       return view('parts/delete_complete');
    }    

}
