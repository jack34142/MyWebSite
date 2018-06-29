<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;
use App\User;
use Validator;

class RegisterController extends Controller
{
    public function index() {
        return view('register')->with('userid','');
    }
    
    public function store(User $user,Response $response) {
        $input=Input::all();
        $userid=$input['userid'];
        $passwd=$input['passwd'];
        
        $exist=$this->exist($userid);
        if($exist){
            return '此帳號已存在！';
        }
        
        $length=$this->length($userid);
        if(!$length){
            return '帳號請設置於3~16字元間！';
        }
        
        //$validator是一個物件
        $validator = $this->check($input);
        if($validator->passes()){
            $user=new User();
            $user->createId($userid,$passwd);
            return '註冊成功！';
        }else{
            $result=$validator->errors()->all();
            return implode('、', $result);
        }
    }
    
    
    public function check($input) {
        $rules = [
            'userid'=>'required',
            'passwd'=>'required|between:6,32|confirmed'
        ];

        $message = [
            'userid.required'=>'請輸入帳號！',
            'passwd.required'=>'請輸入密碼！',
            'passwd.between'=>'密碼請設置於6~32個字元間！',
            'passwd.confirmed'=>'兩次的密碼不同！'
        ];
        return Validator::make($input,$rules,$message);
    }
    
    public function exist($userid) {
        $user=new User();
        $exist=$user->getPasswd($userid);
        
        if($exist){
            return 1;
        }else{
            return 0;
        }
    }
    
    public function length($userid) {
        $double = strlen($userid)-mb_strlen($userid);
        $single = mb_strlen($userid)-($double/2) ;
        $length=$single+$double;
        
        if($length < 3 || $length > 16){
            return 0;
        }else{
            return 1;
        }
    }
}
