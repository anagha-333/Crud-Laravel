<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cruds extends Model
{
    protected $fillable = ['id','Name', 'Address', 'Website','Email'];
    
    
}
