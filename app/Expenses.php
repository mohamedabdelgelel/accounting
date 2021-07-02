<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    public $table="expenses";
    public function account(){
        return $this->belongsTo('App\Account','account_id');
    }
    public function branch(){
        return $this->belongsTo('App\Branches','branch_id');
    }
}
