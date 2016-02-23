<?php

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	//
	public $timestamps = false;
	protected $table = 'orders';
	protected $fillable = ['userid','rest_id','address','items','status'];

	public function restaurant(){
		return  $this->hasOne('Restaurant','id','rest_id');
	}

}
