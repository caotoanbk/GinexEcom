<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class GoodsInfo extends Model
{
	protected $table='GoodsInfo';
	protected $fillable=['name', 'description', 'route', 'sluong', 'htdgoi', 'user_id', 'tgghang', 'tgnhang','nhhdki'];
	
	protected $dates=['created_at', 'updated_at', 'tgghang', 'tgnhang', 'nhhdki'];


	public function setTgghangAttribute($date)
	{
		$this->attributes['tgghang']=Carbon::createFromFormat('d/m/Y H:i', $date);
	}	
	public function getTgghangAttribute($date)
	{
		return Carbon::parse($date)->format('d/m/Y H:i');
	}	
	public function setTgnhangAttribute($date)
	{
		$this->attributes['tgnhang']=Carbon::createFromFormat('d/m/Y H:i', $date);
	}	
	public function getTgnhangAttribute($date)
	{
		return Carbon::parse($date)->format('d/m/Y H:i');
	}	
	public function setNhhdkiAttribute($date)
	{
		$this->attributes['nhhdki']=Carbon::createFromFormat('d/m/Y H:i', $date);
	}	
	public function getNhhdkiAttribute($date)
	{
		return Carbon::parse($date)->format('d/m/Y H:i');
	}	

	public function chaoGia()
	{ 
		return $this->hasMany(Chao_gia::class,'goods_id');
	}
	 public function user()
	 {
		 return $this->belongsTo(User::class, 'user_id');
	 }
}
