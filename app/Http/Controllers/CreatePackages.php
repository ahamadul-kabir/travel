<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;

class CreatePackages extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function createpackagesView()
    {
        return view('tourpackages/createpackages');
    }

}