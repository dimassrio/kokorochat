<?php

class ChatsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /chats
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('chats.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /chats/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('chats.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /chats
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /chats/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /chats/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /chats/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /chats/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function sendMessage($message){
		$publish  = 'pub-c-37979623-3ad7-422d-86c5-b0680959e6d5';
		$subscribe = 'sub-c-8419106c-778d-11e4-82cc-02ee2ddab7fe';

		$pubnub = Connection::initConnection($publish, $subscribe);

		$publish_result = $pubnub->publish('demo',$message);
 
 		print_r($publish_result);
	}

	public function receiveMessage($channel){
		$publish  = 'pub-c-37979623-3ad7-422d-86c5-b0680959e6d5';
		$subscribe = 'sub-c-8419106c-778d-11e4-82cc-02ee2ddab7fe';

		$pubnub = Connection::initConnection($publish, $subscribe);
		$history = $pubnub->history($channel);

		print_r($history);
	}
}