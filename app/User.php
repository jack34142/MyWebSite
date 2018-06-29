<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='user';
    protected $primaryKey='id';
    public $timestamps=false;
    
    public function getPasswd($userid) {
        $pdo = User::where('userid',$userid)->first();
        return $pdo['passwd'];
    }
    
    public function createId($userid,$userPwd) {
        User::insert(['userid'=>$userid,'passwd'=>md5($userPwd)]);
    }
    
}
