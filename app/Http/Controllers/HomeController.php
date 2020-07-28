<?php

namespace App\Http\Controllers;

use App\Book;
use App\Subscription;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (isset(auth()->user()->roles[0]->name) and (auth()->user()->roles[0]->name == 'user')) {
            $books = Book::count();
            $subscription = Subscription::where(['user_id' => auth()->user()->id])->count();
            $users = User::count();
        } else {
            $books = Book::count();
            $subscription = Subscription::count();
            $users = User::count();
        }

        $data = ['books' => $books, 'subscription' => $subscription, 'users' => $users];
        return view('dashboard', compact('data'));
        // return view('home');
    }
}
