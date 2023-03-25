<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function profile($username): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::where('username', $username)->firstOrFail();
        $tweets = Tweet::where('user_id', $user->id)->latest()->paginate(10);

        return view('profile.user', compact('user', 'tweets'));
    }
}
