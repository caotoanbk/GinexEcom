<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CarriersInfo extends Model
{
	protected $table = 'CarriersInfo';
	protected $dates = ['created_at', 'updated_at', 'tgnhang'];

	protected $fillable = ['description', 'route', 'price', 'htdgoi', 'slxe', 'lxe', 'tgnhang', 'user_id'];

	public function setTgnhangAttribute($date)
	{
		$this->attributes['tgnhang']=Carbon::createFromFormat('d/m/Y H:i', $date);
	}
	public function getTgnhangAttribute($date)
	{
		return Carbon::parse($date)->format('d/m/Y H:i');
	}
	public function carrierReq()
	{
		return $this->hasMany(CarrierRequire::class, 'carrier_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
}
