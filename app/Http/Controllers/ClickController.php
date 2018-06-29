<?php

namespace App\Http\Controllers;
use App\Click;

use Illuminate\Http\Request;

class ClickController extends Controller
{
    public function index(Click $click) {
        $times=$click->times();
        return view('click')->with(['times'=>$times]);
    }
    
    public function update($id) {
        $Click = new Click();
        $times=$Click->times();
        
        $times=$times+1;
        $Click->go_update($times);
        
        return $times;
    }
    
}
