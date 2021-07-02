<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class Warning extends Model
{
    public $table="warning";
    public function employee(){
        return $this->belongsTo('App\Employee' , 'employee_id');
    }
}
