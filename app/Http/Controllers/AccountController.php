<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function updateLang(Request $request, $lang)
    {
        $languages = config('custom.languages');
        if (isset($languages[$lang])) {
            $user = $request->user();
            $user->lang = $lang;
            $user->save();
            return redirect()->back();
        }

        return redirect()->back()->withErrors([
            'alert' =>
                [
                    'type' => 'popup',
                    'title' => "Language not found",
                    'message' => 'Error when would to change language, ' . $lang . ' this languages does\'t exists !',
                    'style' => 'warning'
                ]
        ]);
    }

    public function myAccount()
    {
        return view('user.profile',['me' => true, 'user' => Auth::user()]);
    }

    public function updateAvatar (Request $request) {

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $user = Auth::user();
            $uid= $user->id;
            $filename = $uid . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/upload/avatars/' . $filename ) );
            $user->avatar = $filename;
            $user->save();
        }
        return view('user.profile',['me' => true, 'user' => Auth::user()]);
    }
}
