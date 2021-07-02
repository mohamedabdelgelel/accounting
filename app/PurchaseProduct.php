<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class PurchaseProduct extends Model
{
    public $table="purchase_products";


    public function account(){
        return $this->belongsTo('App\Account' , 'account_id');
    }
    public function product(){
        return $this->belongsTo('App\Products' , 'product_id');
    }
}
