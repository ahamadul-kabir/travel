<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;

class Hotels extends Controller
{
	
	public function __construct()
	{
		$this->middleware('admin');
	}


	public function Hotel()
	{
		return view('hotels/hotels');
	}
}