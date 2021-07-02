<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class Oncount extends Model
{
    public $table="on_count";
    public function employee(){
        return $this->belongsTo('App\Employee' , 'employee_id');
    }
}
