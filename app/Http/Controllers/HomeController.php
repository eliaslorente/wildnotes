<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Auth;

class HomeController extends Controller
{
    private $notifications;
    private $notifCount;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->middleware('auth');
            $this->notifications = Notification::where('userOwner_id', Auth::user()->id)->get();
            $this->notifCount = count($this->notifications);
            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
          'notifCount' => $this->notifCount
        ]);
    }
}
