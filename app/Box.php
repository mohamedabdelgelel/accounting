<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    public $table="box";
    public function product(){
        return $this->belongsTo('App\Products','product_id');
    }
}
