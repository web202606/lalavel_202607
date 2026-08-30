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

class JquerydisplayController extends Controller
{
    //
    //検索画面表示
    public function jquerysearch(){
        return view('content/jquery/jquery_search');
        
    }
    //jquery登録スキル検索結果画面表示
    public function jquerylist(Request $request){
        // 空を用意することで(検索結果0件で)値がなくてもエラーにならない
        $jquerys = [];
        $object =new Jquery;
        //テーブルに値がある場合
        if (Gate::allows('admin-only')) {
            if($object->exists()) {
                $jquerys = $object->where('del_flg', 0)->get()->toArray();
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
                
                $jquerys = $object->wherebetween('date', [$from, $until])->where('del_flg', 0)->get()->toArray();
                
                // from 選択された場合
            } elseif (!empty($request['from'])) {
                $from = $request['from'];
                
                $jquerys = $object->where('date', '>=', $from)->where('del_flg', 0)->get()->toArray();
                        
                // until 選択された場合
            } elseif (!empty($request['until'])) {
                $until = $request['until'];
                
                $jquerys = $object->where('date', '<=', $until)->where('del_flg', 0)->get()->toArray();
            
                // from until 両方選択されなかった場合
            } else {
                
                $jquerys = $object->where('del_flg', 0)->get()->toArray();
            }
        } else{
            if(Auth::user()->jquery()->exists()) {
                $jquerys = Auth::user()->jquery()->where('del_flg', 0)->get()->toArray();
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
                
                $jquerys = Auth::user()->jquery()->wherebetween('date', [$from, $until])->where('del_flg', 0)->get()->toArray();
                
                // from 選択された場合
            } elseif (!empty($request['from'])) {
                $from = $request['from'];
                
                $jquerys = Auth::user()->jquery()->where('date', '>=', $from)->where('del_flg', 0)->get()->toArray();
                        
                // until 選択された場合
            } elseif (!empty($request['until'])) {
                $until = $request['until'];
                
                $jquerys = Auth::user()->jquery()->where('date', '<=', $until)->where('del_flg', 0)->get()->toArray();
            
                // from until 両方選択されなかった場合
            } else {
                
                $jquerys = Auth::user()->jquery()->where('del_flg', 0)->get()->toArray();
            }
        }
        return view('content/jquery/jquery_list', compact('jquerys','until','from'));
    }    
    public function jqueryskill(Jquery $jquery){
       
        $pointmax =30;
        $pointmin =10;
        $pointhigh = 3;
        $jquerycomment =[];
        $jquery_point=[];
        $jquery_point[1] = $jquery->jquery_plugin;
        $jquery_point[2] = $jquery->jquery_read;
        $jquery_point[3] = $jquery->jquery_structure;
        $jquery_point[4] = $jquery->jquery_method;
        $jquery_point[5] = $jquery->jquery_event;
        $jquery_point[6] = $jquery->jquery_ajax;
        $jquery_point[7] = $jquery->jquery_alert;
        $jquery_point[8] = $jquery->jquery_counter;
        $jquery_point[9] = $jquery->jquery_animation;
        $jquery_point[10] = $jquery->jquery_fade;
        $jquery_sum = array_sum($jquery_point);

        //理解が完璧でない項目のコメントを取得  
        if($jquery_point[1] !== $pointhigh){
            $jquerycomment[0] = '・プラグイン';
        } 
        if($jquery_point[2] !== $pointhigh){
            $jquerycomment[1] = '・Jqueryの読み込み方法';
        } 
        if($jquery_point[3] !== $pointhigh){
            $jquerycomment[2] = '・セレクタ';
        }
        if($jquery_point[4] !== $pointhigh){
            $jquerycomment[3] = '・メソッド';
        } 
        if($jquery_point[5] !== $pointhigh){
            $jquerycomment[4] = '・イベント';
        } 
        if($jquery_point[6] !== $pointhigh){
            $jquerycomment[5] = '・Ajax通信';
        } 
        if($jquery_point[7] !== $pointhigh){
            $jquerycomment[6] = '・alertの出力方法';
        } 
        if($jquery_point[8] !== $pointhigh){
            $jquerycomment[7] = '・カウンター作成方法';
        } 
        if($jquery_point[9] !== $pointhigh){
            $jquerycomment[8] = '・アニメーション';
        }
        if($jquery_point[10] !== $pointhigh){
            $jquerycomment[9] = '・フェードイン・フェードアウト';
        } 
        //空の配列を詰める
        $jquerycommentlist = array_filter($jquerycomment); 
        return view('content/jquery/jquery_skill', [
            'point' => $jquery_sum,
            'comments' => $jquerycommentlist
        ]);

    }
    //編集
   public function jqueryedit(Jquery $jquery){
        return view('content/jquery/jquery_edit', [
            //'id' => $id,
            'result' => $jquery        
        ]);
    }    
    //更新
    public function jqueryup(Jquery $jquery, CreateData $request){


       $jquery->date = Carbon::today()->format('Y-m-d');
       $jquery->jquery_plugin = $request->jquery_plugin;  
       $jquery->jquery_read = $request->jquery_read;
       $jquery->jquery_structure = $request->jquery_structure;
       $jquery->jquery_method = $request->jquery_method;
       $jquery->jquery_event = $request->jquery_event;
       $jquery->jquery_ajax = $request->jquery_ajax;
       $jquery->jquery_alert = $request->jquery_alert;
       $jquery->jquery_counter = $request->jquery_counter;
       $jquery->jquery_animation = $request->jquery_animation;
       $jquery->jquery_fade = $request->jquery_fade;
       Auth::user()->jquery()->save($jquery);
       return view('parts/update_complete');
    } 
    //物理削除
    public function jquerydel(Jquery $jquery){
       $jquery->delete();
       return view('parts/delete_complete');
    }   
    
    //論理削除 
    public function jquerydelflg(Jquery $jquery){
       $jquery->del_flg = true;
       Auth::user()->jquery()->save($jquery);
       return view('parts/delete_complete');
    }    

}
