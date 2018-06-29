<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    protected $table='click';
    protected $primaryKey='id';
    public $timestamps=false;
    
    public function times() {
        $pdo = Click::select()->first();
        return $pdo['times'];
    }
    
    public function go_update($times) {
        Click::select()->update(['times'=>$times]);
    }
}
