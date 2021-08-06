<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
class AccountController extends Controller
{
    public function index()
    {
        return view('apps.account.index');
    }

    public function update(Request $request)
    {

        $user = User::findOrFail(Auth::user()->id);

        $user->update([

            'name'=>$request->name,
            'email' =>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        // dd($user);
        return redirect()->route('user.account');
    }
}
