<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public $table="products";
    public function classification(){
        return $this->belongsTo('App\Classification','classificaiton_id');
    }
    public function store(){
        return $this->belongsTo('App\Store','store_id');
    }
    public function supplier(){
        return $this->belongsTo('App\Suppliers','supplier_id');
    }
}