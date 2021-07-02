<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $table="transactions";


    public function account(){
        return $this->belongsTo('App\Account' , 'account_id');
    }
}
