<?php namespace App\Http\Controllers;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		$lessons = $this-> getlessons();
		$name = '<em>Jishnu</em>';
		return view('mySite.home',compact('lessons','name'));
	}

	public function about()
	{
		return view('mySite.about');
	}

	public function show($id)
	{
		$lesson= $this-> getlessons()[$id];
		return view ('mySite.show',compact('lesson'));

	}

	private function getlessons(){
		return ['My First lessons','My Second lessons','My Third lessons'];
	}
	
}
