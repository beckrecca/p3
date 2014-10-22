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
	return View::make('main');
});

Route::post('/', function() {

	$p = Input::get('p'); // number of paragraphs of filler text to generate
	$u = Input::get('u'); // number of users to create

	$filler = null; // our string of filler text
	$users = null; // our array of users

	$img = Input::get('img'); 
	$dob = Input::get('dob'); 
	$loc = Input::get('loc'); 

	if ($p > 0) {
		$newfiller = new CuteFiller();
		$newfiller->setText($p);
		$filler = $newfiller->getText();
	}
	
	if ($u > 0) {
		for ($i = 0; $i < $u; $i++) {
			$cuties[$i] = new CuteUser(); // initialize and set new user
			$cuties[$i]->setUser();

			// include an image or not
			if ($img) $users[$i]["img"] = $cuties[$i]->getImg();

			$users[$i]["name"] = $cuties[$i]->getName(); 

			// include DOB or not
			if ($dob) $users[$i]["dob"] = $cuties[$i]->getDOB();

			// include loc or not
			if ($loc) $users[$i]["loc"] = $cuties[$i]->getLoc();	

		}
	}

	return View::make('main')
		 ->with('filler', $filler)
		 ->with('users', $users)
		 ->with('img', $img)
		 ->with('dob', $dob)
		 ->with('loc', $loc);
});