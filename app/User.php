<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','type', 'email', 'password','isAdmin'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function articles()
	{
		$this->hasMany('App\Article');
	}

	public function carrierInfos()
	{
		return $this->hasMany(CarriersInfo::class);
	}

	public function goodsInfos()
	{
		return $this->hasMany(GoodsInfo::class);
	}

}
