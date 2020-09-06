<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable|RedirectResponse
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('home');
    }
}
