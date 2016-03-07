<?php

use Illuminate\Database\Eloquent\Model;
require __DIR__.'/../vendor/autoload.php';
 require_once '../classes/Item.php';

class Restaurant extends Model {

	//
	public $timestamps = false;
	protected $table = 'restaurant';
  protected $fillable = ['name','place','min_order','img'];

  public function items(){
		return $this->hasMany('Item');
	}
  
}
