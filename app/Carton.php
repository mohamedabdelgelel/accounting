<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class Carton extends Model
{
    public $table="carton";
    public function product(){
        return $this->belongsTo('App\Products','product_id');
    }
}
