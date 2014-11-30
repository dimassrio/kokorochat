<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
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
	 * GET /users/{id}/edit
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
	 * PUT /users/{id}
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
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getUsernameByPhone($number){
		$user = User::where('phone', $number)->get()->first();

		return Response::json(array('username' => $user->username));
	}

	public function selfId(){

		if(Auth::check()){
			return Auth::user()->id;
		}else{
			return false;
		}
	}

	public function login(){
		if(Input::has('username')){
			$username = Input::get('username');
			$password = Input::get('password');

			if (Auth::attempt(array('username' => $username, 'password' => $password))){
				if($username == "admin"){
				return Redirect::intended('users/2/chat');
				}else{
				return Redirect::intended('users/1/chat');

				}
			}
		}else{
			return View::make('users.login');
		}
	}
}
