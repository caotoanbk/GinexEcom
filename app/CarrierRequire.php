<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CarriersInfo;
use App\User;

class CarrierRequire extends Model
{
	protected $fillable=['route', 'user_id', 'carrier_id', 'price', 'name', 'htdgoi', 'tgghang', 'tgnhang', 'sluong'];  

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}	

	public function carrier()
	{
		return	$this->belongsTo(CarriersInfo::class, 'carrier_id');
	}

}
