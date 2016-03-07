<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsInfo extends Model
{
	protected $table='GoodsInfo';
	protected $fillable=['name', 'description', 'route', 'date', 'time', 'user_id'];
}
