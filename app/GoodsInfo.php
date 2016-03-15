<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsInfo extends Model
{
	protected $table='GoodsInfo';
	protected $fillable=['name', 'description', 'route', 'date', 'time', 'user_id'];


	public function chaoGia()
	{ 
		return $this->hasMany(Chao_gia::class,'goods_id');
	}
}
