<?php

namespace App\Http\Controllers;

use App\Http\Models\Fan;
use App\User;
use http\Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['home']]);
    }

    public function home(User $user)
    {
        $user = User::withCount(['stars', 'fans', 'posts'])->find($user->id);
        $posts = $user->posts()->take(10)->get();
        $comments = $user->comments()->take(10)->get();
        $stars = $user->stars;
        $susers = User::whereIn('id', $stars->pluck('star_id'))->withCount(['stars', 'fans', 'posts', 'comments'])->get();
        $fans = $user->fans;
        $fusers = User::whereIn('id', $fans->pluck('fan_id'))->withCount(['stars', 'fans', 'posts', 'comments'])->get();
        return view('user.home', compact('user', 'posts', 'comments', 'fusers', 'susers'));
    }

    public function fan(Request $request)
    {
        try{
            $fan_id = $request->get('fan_id');
            $star_id = $request->get('star_id');
            Fan::firstOrCreate(['fan_id' => $fan_id, 'star_id' => $star_id]);
            return $this->returnMsg('200', [], 'success');
        }catch (Exception $e){
            return $this->returnMsg('403', $e->getMessage());
        }

    }

    public function unfan(Request $request)
    {
        try{
            $fan_id = $request->get('fan_id');
            $star_id = $request->get('star_id');
            Fan::where('fan_id', $fan_id)->where('star_id', $star_id)->delete();
            return $this->returnMsg('200', [], 'success');
        }catch (Exception $e){
            return $this->returnMsg('403', $e->getMessage());
        }
    }
}
