<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	/*
	$cute = new CuteFiller();
	$cute->setText(rand(1,10));
	$filler = $cute->getText();

	$users; // Array

	for ($i = 0; $i < rand(2,12); $i++) {
		$cuties[$i] = new CuteUser();
		$cuties[$i]->setUser();
		$users[$i]["name"] = $cuties[$i]->getName();
		$users[$i]["dob"] = $cuties[$i]->getDOB();
		$users[$i]["loc"] = $cuties[$i]->getLoc();
	}
	*/

	return View::make('main');
});

Route::post('/', function() {

	$p = Input::get('p'); // number of paragraphs of filler text to generate
	$u = Input::get('u'); // number of users to create

	$filler = ""; // our string of filler text
	$users = null; // our array of users

	if ($p > 0) {
		$newfiller = new CuteFiller();
		$newfiller->setText($p);
		$filler = $newfiller->getText();
	}
	
	if ($u > 0) {
		for ($i = 0; $i < $u; $i++) {
			$cuties[$i] = new CuteUser();
			$cuties[$i]->setUser();
			$users[$i]["name"] = $cuties[$i]->getName();
			$users[$i]["dob"] = $cuties[$i]->getDOB();
			$users[$i]["loc"] = $cuties[$i]->getLoc();	
		}
	}

	return View::make('main')
		 ->with('filler', $filler)
		 ->with('users', $users);
});