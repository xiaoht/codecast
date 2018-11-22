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
        return view('user.home');
    }

    public function fan()
    {

    }

    public function unfan()
    {
        
    }
}
