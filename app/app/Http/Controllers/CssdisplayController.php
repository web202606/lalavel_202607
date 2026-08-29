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

class CssdisplayController extends Controller
{
    //
    //検索画面表示
    public function csssearch(){
        return view('content/css/css_search');
        
    }
    //css登録スキル検索結果画面表示
    public function csslist(Request $request){
        // 空を用意することで(検索結果0件で)値がなくてもエラーにならない
        $csss = [];
        $object =new Css;
        //テーブルに値がある場合
        if (Gate::allows('admin-only')) {
            if($object->exists()) {
                $csss = $object->where('del_flg', 0)->get()->toArray();
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
                
                $csss = $object->wherebetween('date', [$from, $until])->where('del_flg', 0)->get()->toArray();
                
                // from 選択された場合
            } elseif (!empty($request['from'])) {
                $from = $request['from'];
                
                $csss = $object->where('date', '>=', $from)->where('del_flg', 0)->get()->toArray();
                        
                // until 選択された場合
            } elseif (!empty($request['until'])) {
                $until = $request['until'];
                
                $csss = $object->where('date', '<=', $until)->where('del_flg', 0)->get()->toArray();
            
                // from until 両方選択されなかった場合
            } else {
                
                $csss = $object->where('del_flg', 0)->get()->toArray();
            }
        } else{
            if(Auth::user()->css()->exists()) {
                $csss = Auth::user()->css()->where('del_flg', 0)->get()->toArray();
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
                
                $csss = Auth::user()->css()->wherebetween('date', [$from, $until])->where('del_flg', 0)->get()->toArray();
                
                // from 選択された場合
            } elseif (!empty($request['from'])) {
                $from = $request['from'];
                
                $csss = Auth::user()->css()->where('date', '>=', $from)->where('del_flg', 0)->get()->toArray();
                        
                // until 選択された場合
            } elseif (!empty($request['until'])) {
                $until = $request['until'];
                
                $csss = Auth::user()->css()->where('date', '<=', $until)->where('del_flg', 0)->get()->toArray();
            
                // from until 両方選択されなかった場合
            } else {
                
                $csss = Auth::user()->css()->where('del_flg', 0)->get()->toArray();
            }
        }
        return view('content/css/css_list', compact('csss','until','from'));
    }    
    public function cssskill(Css $css){
       
        $pointmax =30;
        $pointmin =10;
        $pointhigh = 3;
        $csscomment =[];
        $css_point=[];
        $css_point[1] = $css->css_property;
        $css_point[2] = $css->css_element;
        $css_point[3] = $css->css_box;
        $css_point[4] = $css->css_Flexbox;
        $css_point[5] = $css->css_responsive;
        $css_point[6] = $css->css_position;
        $css_point[7] = $css->css_glid;
        $css_point[8] = $css->css_background;
        $css_point[9] = $css->css_display;
        $css_point[10] = $css->css_coding;
        $css_sum = array_sum($css_point);

        //理解が完璧でない項目のコメントを取得  
        if($css_point[1] !== $pointhigh){
            $csscomment[0] = '・セレクタ、プロパティ、値';
        } 
        if($css_point[2] !== $pointhigh){
            $csscomment[1] = '・要素の単位指定';
        } 
        if($css_point[3] !== $pointhigh){
            $csscomment[2] = '・ボックスモデル';
        }
        if($css_point[4] !== $pointhigh){
            $csscomment[3] = '・Flexbox';
        } 
        if($css_point[5] !== $pointhigh){
            $csscomment[4] = '・レスポンシブデザイン';
        } 
        if($css_point[6] !== $pointhigh){
            $csscomment[5] = '・position';
        } 
        if($css_point[7] !== $pointhigh){
            $csscomment[6] = '・グリッドレイアウト';
        } 
        if($css_point[8] !== $pointhigh){
            $csscomment[7] = '・背景(back-ground)';
        } 
        if($css_point[9] !== $pointhigh){
            $csscomment[8] = '・Display';
        }
        if($css_point[10] !== $pointhigh){
            $csscomment[9] = '・模写コーディング';
        } 
        //空の配列を詰める
        $csscommentlist = array_filter($csscomment); 
        return view('content/css/css_skill', [
            'point' => $css_sum,
            'comments' => $csscommentlist
        ]);

    }
    //編集
   public function cssedit(Css $css){
        return view('content/css/css_edit', [
            //'id' => $id,
            'result' => $css        
        ]);
    }    
    //更新
    public function cssup(Css $css, CreateData $request){


       $css->date = Carbon::today()->format('Y-m-d');
       $css->css_property = $request->css_property;  
       $css->css_element = $request->css_element;
       $css->css_box = $request->css_box;
       $css->css_Flexbox = $request->css_Flexbox;
       $css->css_responsive = $request->css_responsive;
       $css->css_position = $request->css_position;
       $css->css_glid = $request->css_glid;
       $css->css_backgroundt = $request->css_background;
       $css->css_display = $request->css_display;
       $css->css_coding = $request->css_coding;
       Auth::user()->css()->save($css);
       return view('parts/update_complete');
    } 
    //物理削除
    public function cssdel(Css $css){
       $css->delete();
       return view('parts/delete_complete');
    }   
    
    //論理削除 
    public function cssdelflg(Css $css){
       $css->del_flg = true;
       Auth::user()->css()->save($css);
       return view('parts/delete_complete');
    }    

}
