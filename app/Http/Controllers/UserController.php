<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home(User $user)
    {
        $user = User::withCount(['stars', 'fans', 'posts'])->find($user->id);
        $posts = $user->posts()->take(10)->get();
        $stars = $user->stars();
        $susers = User::whereIn('id', $stars->plunk('star_id'))->withCount(['stars', 'fans', 'posts'])->get();
        $fans = $user->fans();
        $fusers = User::whereIn('id', $fans->plunk('fan_id'))->withCount(['stars', 'fans', 'posts'])->get();
        return view('user.home', compact('user', 'posts', 'fusers', 'susers'));
    }

    public function fan()
    {

    }

    public function unfan()
    {
        
    }
}
