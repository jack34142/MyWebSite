<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $table='memo';
    protected $primaryKey='id';
    public $timestamps=false;
    
    public function ShowContent($id) {
        $pdo = Memo::select()->where('id',$id)->first();
        return $pdo['content'];
    }
    
    public function searchContent($data) {
//        $pdo = Memo::select()->where('content','like',$data)->orWhere('title','like',$data);
        $pdo = Memo::select()->where('content','like',$data);
        return $pdo;
    }
    
//    public function go_update($times) {
//        Click::select()->update(['times'=>$times]);
//    }
}
