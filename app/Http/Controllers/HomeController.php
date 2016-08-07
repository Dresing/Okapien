<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\APIAuth;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', ['keys' => APIAuth::all(), 'users' => User::all()]);
    }
}
