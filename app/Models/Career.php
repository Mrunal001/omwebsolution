<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $table = 'career';
    protected $fillable = [
        'name','email','education','mobile','c_salary','e_salary','reason','upload','country','state','city','extra'
    ];
}
