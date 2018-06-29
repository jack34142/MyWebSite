<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Memo;

class MemoController extends Controller
{
    public function index($id = null) {
        $memo = new Memo();
        //每個分頁顯示15筆資料
        $page = 10;
        
        if($id === null){
            if(isset($_GET['search'])){
                $search = "%".$_GET['search']."%";
                $article = $memo->searchContent($search)->orderBy('time', 'desc')->paginate($page);
            }else{
                $article = $memo->orderBy('time', 'desc')->paginate($page);
            }
            
            return view('memo/memo')->with('article',$article);
            
        }elseif ($id == 'test') {
            return view('memo/TEST');
        }
        

            
        
        
        return view('memo/article')->with('content',$memo->ShowContent($id));
    }
    
//    public function search() {
//        $input=Input::all();
//        $data="%".$input['data']."%";
//        
//        $memo=new Memo();
//        $title = $memo->searchContent($data);
//        
//        retuen redirect('memo')
//    }
}
