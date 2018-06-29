<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request) {
        if($request->session()->get('userid')){
            return redirect('');
        }
        
        if(!$auto=Cookie::get('auto')){
            $auto['userid']='';
            $auto['memory']='';
        }
        return view('login')
            ->with(['userid'=>$auto['userid'],
                    'memory'=>$auto['memory']]);
    }
    
    public function store(User $user,Request $request) {
        $input=Input::all();

        $userid=$input['userid'];
        $memory=isset($input['memory'])? 'checked': '';

        $auto=array();
        if($memory === 'checked'){
            $auto['memory']='checked';
            $auto['userid']=$userid;
            Cookie::queue(Cookie::forever('auto',$auto));
        }else{
            Cookie::queue(Cookie::forget('auto'));
        }

        if($pdo=$user->getPasswd($userid)){
            if(md5($input['passwd'])===$pdo){
                $request->Session()->put('userid', $userid);
                return "歡迎登入 $userid ！";
            }else{
                return '密碼錯誤！';
            }
        }else{
            return '查無此帳號！';
        }
    }
    
    public function logout(Request $request) {
        $request->session()->forget('userid');
        return redirect('');
    }
    
    
    

}
