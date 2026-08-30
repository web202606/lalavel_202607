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

class LaraveldisplayController extends Controller
{
    //
    //検索画面表示
    public function laraveltblsearch(){
        return view('content/laraveltbl/laraveltbl_search');
        
    }
    //laraveltbl登録スキル検索結果画面表示
    public function laraveltbllist(Request $request){
        // 空を用意することで(検索結果0件で)値がなくてもエラーにならない
        $laraveltbls = [];
        $object =new Laraveltbl;
        //テーブルに値がある場合
        if (Gate::allows('admin-only')) {
            if($object->exists()) {
                $laraveltbls = $object->where('del_flg', 0)->get()->toArray();
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
                
                $laraveltbls = $object->wherebetween('date', [$from, $until])->where('del_flg', 0)->get()->toArray();
                
                // from 選択された場合
            } elseif (!empty($request['from'])) {
                $from = $request['from'];
                
                $laraveltbls = $object->where('date', '>=', $from)->where('del_flg', 0)->get()->toArray();
                        
                // until 選択された場合
            } elseif (!empty($request['until'])) {
                $until = $request['until'];
                
                $laraveltbls = $object->where('date', '<=', $until)->where('del_flg', 0)->get()->toArray();
            
                // from until 両方選択されなかった場合
            } else {
                
                $laraveltbls = $object->where('del_flg', 0)->get()->toArray();
            }
        } else{
            if(Auth::user()->laraveltbl()->exists()) {
                $laraveltbls = Auth::user()->laraveltbl()->where('del_flg', 0)->get()->toArray();
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
                
                $laraveltbls = Auth::user()->laraveltbl()->wherebetween('date', [$from, $until])->where('del_flg', 0)->get()->toArray();
                
                // from 選択された場合
            } elseif (!empty($request['from'])) {
                $from = $request['from'];
                
                $laraveltbls = Auth::user()->laraveltbl()->where('date', '>=', $from)->where('del_flg', 0)->get()->toArray();
                        
                // until 選択された場合
            } elseif (!empty($request['until'])) {
                $until = $request['until'];
                
                $laraveltbls = Auth::user()->laraveltbl()->where('date', '<=', $until)->where('del_flg', 0)->get()->toArray();
            
                // from until 両方選択されなかった場合
            } else {
                
                $laraveltbls = Auth::user()->laraveltbl()->where('del_flg', 0)->get()->toArray();
            }
        }
        return view('content/laraveltbl/laraveltbl_list', compact('laraveltbls','until','from'));
    }    
    public function laraveltblskill(Laraveltbl $laraveltbl){
       
        $pointmax =30;
        $pointmin =10;
        $pointhigh = 3;
        $laraveltblcomment =[];
        $laraveltbl_point=[];
        $laraveltbl_point[1] = $laraveltbl->laraveltbl_mvs;
        $laraveltbl_point[2] = $laraveltbl->laraveltbl_route;
        $laraveltbl_point[3] = $laraveltbl->laraveltbl_controller;
        $laraveltbl_point[4] = $laraveltbl->laraveltbl_model;
        $laraveltbl_point[5] = $laraveltbl->laraveltbl_view;
        $laraveltbl_point[6] = $laraveltbl->laraveltbl_naming;
        $laraveltbl_point[7] = $laraveltbl->laraveltbl_eloquent;
        $laraveltbl_point[8] = $laraveltbl->laraveltbl_join;
        $laraveltbl_point[9] = $laraveltbl->laraveltbl_templete;
        $laraveltbl_point[10] = $laraveltbl->laraveltbl_web;
        $laraveltbl_sum = array_sum($laraveltbl_point);

        //理解が完璧でない項目のコメントを取得  
        if($laraveltbl_point[1] !== $pointhigh){
            $laraveltblcomment[0] = '・MVCモデル';
        } 
        if($laraveltbl_point[2] !== $pointhigh){
            $laraveltblcomment[1] = '・ルーティング';
        } 
        if($laraveltbl_point[3] !== $pointhigh){
            $laraveltblcomment[2] = '・コントローラー';
        }
        if($laraveltbl_point[4] !== $pointhigh){
            $laraveltblcomment[3] = '・モデル';
        } 
        if($laraveltbl_point[5] !== $pointhigh){
            $laraveltblcomment[4] = '・VIEW';
        } 
        if($laraveltbl_point[6] !== $pointhigh){
            $laraveltblcomment[5] = '・命名規則';
        } 
        if($laraveltbl_point[7] !== $pointhigh){
            $laraveltblcomment[6] = '・Eloquent、クエリビルダ';
        } 
        if($laraveltbl_point[8] !== $pointhigh){
            $laraveltblcomment[7] = '・テーブル結合';
        } 
        if($laraveltbl_point[9] !== $pointhigh){
            $laraveltblcomment[8] = '・テンプレートエンジン';
        }
        if($laraveltbl_point[10] !== $pointhigh){
            $laraveltblcomment[9] = '・WEBサイト自作';
        } 
        //空の配列を詰める
        $laraveltblcommentlist = array_filter($laraveltblcomment); 
        return view('content/laraveltbl/laraveltbl_skill', [
            'point' => $laraveltbl_sum,
            'comments' => $laraveltblcommentlist
        ]);

    }
    //編集
   public function laraveltbledit(Laraveltbl $laraveltbl){
        return view('content/laraveltbl/laraveltbl_edit', [
            //'id' => $id,
            'result' => $laraveltbl        
        ]);
    }    
    //更新
    public function laraveltblup(Laraveltbl $laraveltbl, CreateData $request){


       $laraveltbl->date = Carbon::today()->format('Y-m-d');
       $laraveltbl->laraveltbl_mvs = $request->laraveltbl_mvs;  
       $laraveltbl->laraveltbl_route = $request->laraveltbl_route;
       $laraveltbl->laraveltbl_controller = $request->laraveltbl_controller;
       $laraveltbl->laraveltbl_model = $request->laraveltbl_model;
       $laraveltbl->laraveltbl_view = $request->laraveltbl_view;
       $laraveltbl->laraveltbl_naming = $request->laraveltbl_naming;
       $laraveltbl->laraveltbl_eloquent = $request->laraveltbl_eloquent;
       $laraveltbl->laraveltbl_join = $request->laraveltbl_join;
       $laraveltbl->laraveltbl_templete = $request->laraveltbl_templete;
       $laraveltbl->laraveltbl_web = $request->laraveltbl_web;
       Auth::user()->laraveltbl()->save($laraveltbl);
       return view('parts/update_complete');
    } 
    //物理削除
    public function laraveltbldel(Laraveltbl $laraveltbl){
       $laraveltbl->delete();
       return view('parts/delete_complete');
    }   
    
    //論理削除 
    public function laraveltbldelflg(Laraveltbl $laraveltbl){
       $laraveltbl->del_flg = true;
       Auth::user()->laraveltbl()->save($laraveltbl);
       return view('parts/delete_complete');
    }    

}
