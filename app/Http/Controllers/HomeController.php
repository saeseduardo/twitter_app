<?php

namespace App\Http\Controllers;

use App\Tweet;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tweets = Tweet::with('user')->orderBy('created_at', 'DESC')->get();
        return view('home', compact('tweets'));
    }

    public function createTweet(Request $request)
    {
        Tweet::create([
            'user_id' => Auth()->user()->id,
            'message' => $request->message
        ]);
        return redirect()->to('/home');
    }
}
