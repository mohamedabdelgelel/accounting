<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public $table="purchases";


    public function account(){
        return $this->belongsTo('App\Account' , 'account_id');
    }
}
