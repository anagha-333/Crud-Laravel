<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = ['id','FirstName','LastName', 'companyid','Email','phone'];

    public function employee(){
        return $this->belongsto('App\Cruds');
    }
}
