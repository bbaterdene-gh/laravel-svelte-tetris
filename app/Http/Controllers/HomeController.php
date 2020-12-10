<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;
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
      $user = auth()->user();
      $histories = Point::where('user_email', $user->email)->get();
      return view('home', ['histories'=>$histories]);
    }
}
