<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class Revenues extends Model
{
    public $table="revenues";
    public function account(){
        return $this->belongsTo('App\Account','account_id');
    }
    public function branch(){
        return $this->belongsTo('App\Branches','branch_id');
    }
}
