<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function topup(Request $request){
        $user = User::find(auth()->user()->id);
        $user->money = $user->money + $request->money;
        $user->update();

        return redirect('/dashboard');
    }
}
