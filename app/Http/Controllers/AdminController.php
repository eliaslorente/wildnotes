<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\User;
use Auth;

class AdminController extends Controller
{
  private $notifications;
  private $notifCount;

  public function __construct(Request $request)
  {
    $this->middleware(function ($request, $next) {
        $this->notifications = Notification::where('userOwner_id', Auth::user()->id)->get();
        $this->notifCount = count($this->notifications);
        return $next($request);
    });
  }

  public function index() {
    if (Auth::user()->role->role_name == 'admin') {

      $users = User::all();
      return view('admin.index', [
        'users' => $users,
        'notifCount' => $this->notifCount
      ]);

    } else {
      return redirect('home');
    }
  }
}
