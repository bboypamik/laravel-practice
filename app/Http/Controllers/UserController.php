<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function uploadAvatar(Request $request){

        $filename = $request->image->getClientOriginalName();

        $request->image->storeAs('images', $filename, 'public');
        auth()->user()->update(['avatar' => $filename]);
        return redirect()->back();
    }

    public function index(){
//
//        $user = new User();
//        $user->name = 'miro';
//        $user->email = 'bboypamik@gmail.com';
//        $user->password = bcrypt('bta');
//        $user->save();

//        User::where('id', 2)->delete();

        $user = User::all();
        return $user;
     return view('home');
    }
}
