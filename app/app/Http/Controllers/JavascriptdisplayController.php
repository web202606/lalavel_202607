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

class JavascriptdisplayController extends Controller
{
    //
    //検索画面表示
    public function javascriptsearch(){
        return view('content/javascript/javascript_search');
        
    }
    //javascript登録スキル検索結果画面表示
    public function javascriptlist(Request $request){
        // 空を用意することで(検索結果0件で)値がなくてもエラーにならない
        $javascripts = [];
        $object =new Javascript;
        //テーブルに値がある場合
        if (Gate::allows('admin-only')) {
            if($object->exists()) {
                $javascripts = $object->where('del_flg', 0)->get()->toArray();
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
                
                $javascripts = $object->wherebetween('date', [$from, $until])->where('del_flg', 0)->get()->toArray();
                
                // from 選択された場合
            } elseif (!empty($request['from'])) {
                $from = $request['from'];
                
                $javascripts = $object->where('date', '>=', $from)->where('del_flg', 0)->get()->toArray();
                        
                // until 選択された場合
            } elseif (!empty($request['until'])) {
                $until = $request['until'];
                
                $javascripts = $object->where('date', '<=', $until)->where('del_flg', 0)->get()->toArray();
            
                // from until 両方選択されなかった場合
            } else {
                
                $javascripts = $object->where('del_flg', 0)->get()->toArray();
            }
        } else{
            if(Auth::user()->javascript()->exists()) {
                $javascripts = Auth::user()->javascript()->where('del_flg', 0)->get()->toArray();
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
                
                $javascripts = Auth::user()->javascript()->wherebetween('date', [$from, $until])->where('del_flg', 0)->get()->toArray();
                
                // from 選択された場合
            } elseif (!empty($request['from'])) {
                $from = $request['from'];
                
                $javascripts = Auth::user()->javascript()->where('date', '>=', $from)->where('del_flg', 0)->get()->toArray();
                        
                // until 選択された場合
            } elseif (!empty($request['until'])) {
                $until = $request['until'];
                
                $javascripts = Auth::user()->javascript()->where('date', '<=', $until)->where('del_flg', 0)->get()->toArray();
            
                // from until 両方選択されなかった場合
            } else {
                
                $javascripts = Auth::user()->javascript()->where('del_flg', 0)->get()->toArray();
            }
        }
        return view('content/javascript/javascript_list', compact('javascripts','until','from'));
    }    
    public function javascriptskill(Javascript $javascript){
       
        $pointmax =30;
        $pointmin =10;
        $pointhigh = 3;
        $javascriptcomment =[];
        $javascript_point=[];
        $javascript_point[1] = $javascript->javascript_read;
        $javascript_point[2] = $javascript->javascript_file;
        $javascript_point[3] = $javascript->javascript_grammar;
        $javascript_point[4] = $javascript->javascript_variable;
        $javascript_point[5] = $javascript->javascript_data;
        $javascript_point[6] = $javascript->javascript_comparison;
        $javascript_point[7] = $javascript->javascript_logical;
        $javascript_point[8] = $javascript->javascript_dom;
        $javascript_point[9] = $javascript->javascript_structure;
        $javascript_point[10] = $javascript->javascript_method;
        $javascript_sum = array_sum($javascript_point);

        //理解が完璧でない項目のコメントを取得  
        if($javascript_point[1] !== $pointhigh){
            $javascriptcomment[0] = '・JavaScriptファイルの読み込み方法';
        } 
        if($javascript_point[2] !== $pointhigh){
            $javascriptcomment[1] = '・ファイルの出力方法';
        } 
        if($javascript_point[3] !== $pointhigh){
            $javascriptcomment[2] = '・オブジェクト、パラメータ';
        }
        if($javascript_point[4] !== $pointhigh){
            $javascriptcomment[3] = '・変数';
        } 
        if($javascript_point[5] !== $pointhigh){
            $javascriptcomment[4] = '・データ型';
        } 
        if($javascript_point[6] !== $pointhigh){
            $javascriptcomment[5] = '・比較演算子';
        } 
        if($javascript_point[7] !== $pointhigh){
            $javascriptcomment[6] = '・論理演算子';
        } 
        if($javascript_point[8] !== $pointhigh){
            $javascriptcomment[7] = '・DOM操作';
        } 
        if($javascript_point[9] !== $pointhigh){
            $javascriptcomment[8] = '・プログラムの構造';
        }
        if($javascript_point[10] !== $pointhigh){
            $javascriptcomment[9] = '・メソッド';
        } 
        //空の配列を詰める
        $javascriptcommentlist = array_filter($javascriptcomment); 
        return view('content/javascript/javascript_skill', [
            'point' => $javascript_sum,
            'comments' => $javascriptcommentlist
        ]);

    }
    //編集
   public function javascriptedit(Javascript $javascript){
        return view('content/javascript/javascript_edit', [
            //'id' => $id,
            'result' => $javascript        
        ]);
    }    
    //更新
    public function javascriptup(Javascript $javascript, CreateData $request){


       $javascript->date = Carbon::today()->format('Y-m-d');
       $javascript->javascript_read = $request->javascript_read;  
       $javascript->javascript_file = $request->javascript_file;
       $javascript->javascript_grammar = $request->javascript_grammar;
       $javascript->javascript_variable = $request->javascript_variable;
       $javascript->javascript_data = $request->javascript_data;
       $javascript->javascript_comparison = $request->javascript_comparison;
       $javascript->javascript_logical = $request->javascript_logical;
       $javascript->javascript_dom = $request->javascript_dom;
       $javascript->javascript_structure = $request->javascript_structure;
       $javascript->javascript_method = $request->javascript_method;
       Auth::user()->javascript()->save($javascript);
       return view('parts/update_complete');
    } 
    //物理削除
    public function javascriptdel(Javascript $javascript){
       $javascript->delete();
       return view('parts/delete_complete');
    }   
    
    //論理削除 
    public function javascriptdelflg(Javascript $javascript){
       $javascript->del_flg = true;
       Auth::user()->javascript()->save($javascript);
       return view('parts/delete_complete');
    }    

}
