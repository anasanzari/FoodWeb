<?php

use Illuminate\Database\Eloquent\Model;
require __DIR__.'/../vendor/autoload.php';
 require_once '../classes/Item.php';

class Restaurant extends Model {

	//
	public $timestamps = false;
	protected $table = 'restaurant';

  public function items(){
		return $this->hasMany('Item');
	}
}
