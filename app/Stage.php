<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $fillable = [
    	'name',
    	'user_id',
    	'color'
    ];
}
