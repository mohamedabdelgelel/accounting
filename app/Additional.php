<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class Additional extends Model
{
    public $table="additional";
    public function employee(){
        return $this->belongsTo('App\Employee' , 'employee_id');
    }
}
