<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chao_gia extends Model
{
	protected $table="chaogia";
	protected $fillable=['user_id', 'goods_id', 'price'];
	
	public function user()
	{
		return $this->belongTo(User::class);
	}

	public function goods()
	{
		return $this->belongTo(GoodsInfo::class, 'goods_id');
	}
}
