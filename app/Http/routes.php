<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'api/v1'], function () {
	Route::get('events', 'EventController@index');
	Route::get('live_events', 'EventController@live');
	Route::get('events/{id}', 'EventController@show'); //show stand's event
	Route::get('stands/{id}', 'StandController@show');
	Route::post('stands/{stand_id}/company', 'CompanyController@store'); //booking a stand
	Route::post('stands/{stand_id}/visitors', 'VisitorController@store'); //register a visite in a stand
});

function PrimeFactor($number)
{
	$factors = array();

	while ($number % 2 == 0)
	{
		array_push($factors, 2);
		$number /= 2;
	}

	for ($i = 3; $i <= sqrt($number); $i += 2)
	{
		while ($number % $i == 0)
		{
			array_push($factors, $i);
			$number = (int)($number / $i);
		}
	}

	if ($number > 2)
	{
		array_push($factors, $number);
	}

	return $factors;
}


Route::get('test', function() {
    dd(PrimeFactor(50));
});