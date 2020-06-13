<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class NotificationsController extends Controller
{
  public function index()
  {
      return view('notifications.index');
  }

  public function search(Request $request)
  {
      $user = User::where('email', $request->email)->first();
      //dd($user);
      if ($user != null ) {
        return view('notifications.index')->with('userShare', $user);
      } else {
        return view('notifications.index')->with('empty', true);
      }

  }
}
