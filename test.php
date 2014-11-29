<?php
	require_once('vendor/pubnub/pubnub/composer/lib/autoloader.php');
	use Pubnub\Pubnub;
	$publish  = 'pub-c-37979623-3ad7-422d-86c5-b0680959e6d5';
	$subscribe = 'sub-c-8419106c-778d-11e4-82cc-02ee2ddab7fe';
	$pubnub = new Pubnub($publish, $subscribe);
	
	$pubnub->subscribe('demo', function($message) {
	 	var_dump($message);
		return true;
	});
?>