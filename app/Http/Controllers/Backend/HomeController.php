<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Message;
use App\Models\Property;
use App\Models\User;
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
        $property = Property::count();
        $agent = User::where('role', 'user')->count();
        $admin = User::where('role', 'admin')->count();
        $article = Article::count();
        $messages = Message::where('user_id', auth()->id())->latest()->get();
        return view('backend.dashboard', compact([
            'messages',
            'property',
            'agent',
            'admin',
            'article',
        ]));
    }
}
