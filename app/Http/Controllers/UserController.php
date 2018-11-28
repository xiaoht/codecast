<?php

namespace App\Http\Controllers;

use App\Http\Models\Fan;
use App\User;
use Auth;

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
        $comments = $user->comments()->take(10)->get();
        $stars = $user->stars();
        $susers = User::whereIn('id', $stars->pluck('star_id'))->withCount(['stars', 'fans', 'posts'])->get();
        $fans = $user->fans();
        $fusers = User::whereIn('id', $fans->pluck('fan_id'))->withCount(['stars', 'fans', 'posts'])->get();
        return view('user.home', compact('user', 'posts', 'comments', 'fusers', 'susers'));
    }

    public function fan(User $user)
    {
        try{
            $me = Auth::user();
            Fan::firstOrCreate(['fan_id' => $me->id, 'star_id' => $user->id]);
        }catch (\Exception $e){
            return $this->returnMsg('403', $e->getMessage());
        }

    }

    public function unfan()
    {
        $me = Auth::user();
        Fan::where('fan_id', $me->id)->where('star_id', $user->id)->delete();
    }
}
