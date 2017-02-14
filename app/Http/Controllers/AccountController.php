<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function updateLang(Request $request, $lang)
    {
        $languages = config('custom.languages');
        if (isset($languages[$lang])) {
            $user = $request->user();
            $user->lang = $lang;
            $user->save();
            return redirect()->back();
        }

        return redirect()->back()->withErrors(['default' => ['type' => 'popup', 'message' => 'Error when would to change language, ' . $lang . ' this languages does\'t exists !']]);
    }

    function myAccount()
    {
        return view('users.profile',['me' => true, 'user' => Auth::user()]);
    }
}
