<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $table="permission";

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}