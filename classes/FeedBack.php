<?php

use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model {

	//
	public $timestamps = false;
	protected $table = 'feedback';
	protected $fillable = ['name','email','feedback'];

}
