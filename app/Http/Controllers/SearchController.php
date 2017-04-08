<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function searchView(Request $request, $type)
    {

        return view('search');
    }
}
