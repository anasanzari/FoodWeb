<?php

use Illuminate\Database\Eloquent\Model;
require __DIR__.'/../vendor/autoload.php';
 require_once '../classes/Restaurant.php';

class Item extends Model {

	//
	public $timestamps = false;
	protected $table = 'items';
  protected $primaryKey = 'item_id';

  public function restaurant()
  {
		return $this->belongsTo('Restaurant');
	}

}
