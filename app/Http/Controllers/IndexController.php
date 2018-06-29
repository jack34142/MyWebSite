<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    public function home() {
        return view('home');
    }
    
    public function introduce() {
        return view('introduce');
    }
    
    public function resume(Request $request) {
        $userid=$request->session()->get('userid');
        if($userid == '我是俊毅'){
            return view('resume');
        }
        return redirect('');
        
    }

}
