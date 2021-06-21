<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;

class Touragency extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}

	public function touragency()
	{
		return view('touragency/touragency');
	}

	


}