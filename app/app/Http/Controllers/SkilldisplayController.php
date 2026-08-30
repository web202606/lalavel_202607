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
use App\Skill;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class SkilldisplayController extends Controller
{
    //
    //検索画面表示
    public function skillsearch(){
        return view('content/skill/skill_search');
        
    }
    //skill登録スキル検索結果画面表示
    public function skilllist(Request $request){
        // 空を用意することで(検索結果0件で)値がなくてもエラーにならない
        $skills = [];
        $object =new Skill;
        //テーブルに値がある場合
        if (Gate::allows('admin-only')) {
            if($object->exists()) {
                $skills = $object->where('del_flg', 0)->get()->toArray();
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
                
                $skills = $object->wherebetween('date', [$from, $until])->where('del_flg', 0)->get()->toArray();
                
                // from 選択された場合
            } elseif (!empty($request['from'])) {
                $from = $request['from'];
                
                $skills = $object->where('date', '>=', $from)->where('del_flg', 0)->get()->toArray();
                        
                // until 選択された場合
            } elseif (!empty($request['until'])) {
                $until = $request['until'];
                
                $skills = $object->where('date', '<=', $until)->where('del_flg', 0)->get()->toArray();
            
                // from until 両方選択されなかった場合
            } else {
                
                $skills = $object->where('del_flg', 0)->get()->toArray();
            }
        } else{
            if(Auth::user()->skill()->exists()) {
                $skills = Auth::user()->skill()->where('del_flg', 0)->get()->toArray();
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
                
                $skills = Auth::user()->skill()->wherebetween('date', [$from, $until])->where('del_flg', 0)->get()->toArray();
                
                // from 選択された場合
            } elseif (!empty($request['from'])) {
                $from = $request['from'];
                
                $skills = Auth::user()->skill()->where('date', '>=', $from)->where('del_flg', 0)->get()->toArray();
                        
                // until 選択された場合
            } elseif (!empty($request['until'])) {
                $until = $request['until'];
                
                $skills = Auth::user()->skill()->where('date', '<=', $until)->where('del_flg', 0)->get()->toArray();
            
                // from until 両方選択されなかった場合
            } else {
                
                $skills = Auth::user()->skill()->where('del_flg', 0)->get()->toArray();
            }
        }
        return view('content/skill/skill_list', compact('skills','until','from'));
    }    
    public function skillskill(Skill $skill){
       
        $pointmax = 210;
        $pointmin = 70;
        $pointhigh = 30;
        $skillcomment =[];
        $skill_point=[];
        $skill_point[1] = $skill->html_point;
        $skill_point[2] = $skill->css_point;
        $skill_point[3] = $skill->javascript_point;
        $skill_point[4] = $skill->jquery_point;
        $skill_point[5] = $skill->php_point;
        $skill_point[6] = $skill->db_point;
        $skill_point[7] = $skill->laravel_point;
        
        $skill_sum = array_sum($skill_point);

        //理解が完璧でない項目のコメントを取得  
        if($skill_point[1] !== $pointhigh){
            $skillcomment[0] = '・HTMLスキル';
        } 
        if($skill_point[2] !== $pointhigh){
            $skillcomment[1] = '・CSSスキル';
        } 
        if($skill_point[3] !== $pointhigh){
            $skillcomment[2] = '・Javascriptスキル';
        }
        if($skill_point[4] !== $pointhigh){
            $skillcomment[3] = '・Jqueryスキル';
        } 
        if($skill_point[5] !== $pointhigh){
            $skillcomment[4] = '・PHPスキル';
        } 
        if($skill_point[6] !== $pointhigh){
            $skillcomment[5] = '・DBスキル';
        } 
        if($skill_point[7] !== $pointhigh){
            $skillcomment[6] = '・Laravelスキル';
        } 

        //空の配列を詰める
        $skillcommentlist = array_filter($skillcomment); 
        return view('content/skill/skill_skill', [
            'point' => $skill_sum,
            'comments' => $skillcommentlist
        ]);

    }

    //物理削除
    public function skilldel(Skill $skill){
       $skill->delete();
       return view('parts/delete_complete');
    }   
    
    //論理削除 
    public function skilldelflg(Skill $skill){
       $skill->del_flg = true;
       Auth::user()->skill()->save($skill);
       return view('parts/delete_complete');
    }    
}
