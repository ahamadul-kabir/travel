<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TravelGear Extends controller

{  

	public function __construct()
	{
		$this->middleware('admin');
	}

	public function travelgear()
	{


		return view ('travelGear/travelgear');
	}





}