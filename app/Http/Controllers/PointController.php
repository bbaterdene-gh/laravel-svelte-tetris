<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;
class PointController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $newPoint = new Point;

      $user = auth()->user();
      $point = $request->point;
      Point::create(
        ['user_name' => $user->name, 'user_email' => $user->email, 'point' => $point]
      );
  
      return redirect('/');
    }
}
