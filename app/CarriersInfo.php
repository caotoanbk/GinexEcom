<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarriersInfo extends Model
{
	protected $table = 'CarriersInfo';

	protected $fillable = ['description', 'route', 'price', 'date', 'user_id'];
}
