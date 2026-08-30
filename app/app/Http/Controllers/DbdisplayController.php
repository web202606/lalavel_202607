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

class DbdisplayController extends Controller
{
    //
    //検索画面表示
    public function databasesearch(){
        return view('content/database/database_search');
        
    }
    //database登録スキル検索結果画面表示
    public function databaselist(Request $request){
        // 空を用意することで(検索結果0件で)値がなくてもエラーにならない
        $databases = [];
        $object =new Database;
        //テーブルに値がある場合
        if (Gate::allows('admin-only')) {
            if($object->exists()) {
                $databases = $object->where('del_flg', 0)->get()->toArray();
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
                
                $databases = $object->wherebetween('date', [$from, $until])->where('del_flg', 0)->get()->toArray();
                
                // from 選択された場合
            } elseif (!empty($request['from'])) {
                $from = $request['from'];
                
                $databases = $object->where('date', '>=', $from)->where('del_flg', 0)->get()->toArray();
                        
                // until 選択された場合
            } elseif (!empty($request['until'])) {
                $until = $request['until'];
                
                $databases = $object->where('date', '<=', $until)->where('del_flg', 0)->get()->toArray();
            
                // from until 両方選択されなかった場合
            } else {
                
                $databases = $object->where('del_flg', 0)->get()->toArray();
            }
        } else{
            if(Auth::user()->database()->exists()) {
                $databases = Auth::user()->database()->where('del_flg', 0)->get()->toArray();
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
                
                $databases = Auth::user()->database()->wherebetween('date', [$from, $until])->where('del_flg', 0)->get()->toArray();
                
                // from 選択された場合
            } elseif (!empty($request['from'])) {
                $from = $request['from'];
                
                $databases = Auth::user()->database()->where('date', '>=', $from)->where('del_flg', 0)->get()->toArray();
                        
                // until 選択された場合
            } elseif (!empty($request['until'])) {
                $until = $request['until'];
                
                $databases = Auth::user()->database()->where('date', '<=', $until)->where('del_flg', 0)->get()->toArray();
            
                // from until 両方選択されなかった場合
            } else {
                
                $databases = Auth::user()->database()->where('del_flg', 0)->get()->toArray();
            }
        }
        return view('content/database/database_list', compact('databases','until','from'));
    }    
    public function databaseskill(Database $database){
       
        $pointmax =30;
        $pointmin =10;
        $pointhigh = 3;
        $databasecomment =[];
        $database_point=[];
        $database_point[1] = $database->database_crud;
        $database_point[2] = $database->database_rule;
        $database_point[3] = $database->database_query;
        $database_point[4] = $database->database_join;
        $database_point[5] = $database->database_groupby;
        $database_point[6] = $database->database_transaction;
        $database_point[7] = $database->database_Injection;
        $database_point[8] = $database->database_placeholder;
        $database_point[9] = $database->database_connect;
        $database_point[10] = $database->database_sql;
        $database_sum = array_sum($database_point);

        //理解が完璧でない項目のコメントを取得  
        if($database_point[1] !== $pointhigh){
            $databasecomment[0] = '・CRUD処理';
        } 
        if($database_point[2] !== $pointhigh){
            $databasecomment[1] = '・型・制約';
        } 
        if($database_point[3] !== $pointhigh){
            $databasecomment[2] = '・サブクエリ(副問い合わせ)';
        }
        if($database_point[4] !== $pointhigh){
            $databasecomment[3] = '・JOIN (INNER JOIN / OUTER JOIN)';
        } 
        if($database_point[5] !== $pointhigh){
            $databasecomment[4] = '・GROUP BY';
        } 
        if($database_point[6] !== $pointhigh){
            $databasecomment[5] = '・トランザクション';
        } 
        if($database_point[7] !== $pointhigh){
            $databasecomment[6] = '・SQLインジェクション';
        } 
        if($database_point[8] !== $pointhigh){
            $databasecomment[7] = '・ブレースホルダー';
        } 
        if($database_point[9] !== $pointhigh){
            $databasecomment[8] = '・WEBページとDBの接続方法';
        }
        if($database_point[10] !== $pointhigh){
            $databasecomment[9] = '・SQL操作';
        } 
        //空の配列を詰める
        $databasecommentlist = array_filter($databasecomment); 
        return view('content/database/database_skill', [
            'point' => $database_sum,
            'comments' => $databasecommentlist
        ]);

    }
    //編集
   public function databaseedit(Database $database){
        return view('content/database/database_edit', [
            //'id' => $id,
            'result' => $database        
        ]);
    }    
    //更新
    public function databaseup(Database $database, CreateData $request){


       $database->date = Carbon::today()->format('Y-m-d');
       $database->database_crud = $request->database_crud;  
       $database->database_rule = $request->database_rule;
       $database->database_query = $request->database_query;
       $database->database_join = $request->database_join;
       $database->database_groupby = $request->database_groupby;
       $database->database_transaction = $request->database_transaction;
       $database->database_Injection = $request->database_Injection;
       $database->database_placeholder = $request->database_placeholder;
       $database->database_connect = $request->database_connect;
       $database->database_sql = $request->database_sql;
       Auth::user()->database()->save($database);
       return view('parts/update_complete');
    } 
    //物理削除
    public function databasedel(Database $database){
       $database->delete();
       return view('parts/delete_complete');
    }   
    
    //論理削除 
    public function databasedelflg(Database $database){
       $database->del_flg = true;
       Auth::user()->database()->save($database);
       return view('parts/delete_complete');
    }    

}
