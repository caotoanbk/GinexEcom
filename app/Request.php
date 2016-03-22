<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
	protected $fillable=['carrier_id', 'goods_id', 'occur', 'price'];
}
