<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
    	'name',
    	'user_id',
		'description',
		'stage_id',
		'due_date'
	];
}
