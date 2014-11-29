<?php
use Pubnub\Pubnub;
class Connection extends \Eloquent {
	
	protected $fillable = [];

	public static function initConnection($public, $subscribe){
		$pubnub = new Pubnub($public, $subscribe);

		return $pubnub;

	}
}