<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolio';
    protected $fillable = [
        'title','images','type','status'
    ];
}
