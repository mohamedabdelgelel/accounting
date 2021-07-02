<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class Baku extends Model
{
    public $table="baku";
    public function product(){
        return $this->belongsTo('App\Products','product_id');
    }
}
