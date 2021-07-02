<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class BranchAccount extends Model
{
    public $table="branch_account";
    public function account(){
        return $this->belongsTo('App\Accounts','account_id');
    }
}
