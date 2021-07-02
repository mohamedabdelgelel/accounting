<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public $table="attendance";
    public function employee(){
        return $this->belongsTo('App\Employee' , 'employee_id');
    }
}
