<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    public $table="hodlidays";
    public function employee(){
        return $this->belongsTo('App\Employee' , 'employee_id');
    }
}
