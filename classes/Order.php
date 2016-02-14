<?php

use Illuminate\Database\Eloquent\Model;
require __DIR__.'/../vendor/autoload.php';
 require_once '../classes/Restaurant.php';

class Order extends Model {

	//
	public $timestamps = false;
	protected $table = 'orders';



}
