<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\User;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function search(Request $request)
    {
        if ($request->wantsJson())
        {
            $result = array();
            $result['users'] = User::search($request->get('search'))->get();
            $result['users_total'] = count($result['users']);
            return ($result);
        }
        else
        {
            return view('search', ['search_for' => 'none']);
        }
    }

    public function searchUser(Request $request)
    {
        if ($request->wantsJson())
        {
            return Datatables::of(User::query())->make(true);
        }
        else
        {
            return view('search', ['search_for' => 'user']);
        }

    }
}
