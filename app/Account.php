<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public $table="accounts";
    public function main(){
        return $this->belongsTo('App\MainAccount','main_id');
    }
}
