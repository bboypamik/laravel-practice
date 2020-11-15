<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        if ($request->hasFile('image')) {
            User::uploadAvatar($request->image);
           $request->session()->flash('message', 'Image Uploaded.');
        }
        $request->session()->flash('error', 'Image was not Uploaded');
        return redirect()->back();
    }



    public function index()
    {
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
