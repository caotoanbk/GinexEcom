<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Test extends Model
{
    protected $fillable=['test'];
	
	protected $dates = ['created_at', 'updated_at', 'test'];


	public function setTestAttribute($date)
	{
		$this->attributes['test']=Carbon::createFromFormat('d/m/Y H:i', $date);
	}

}

