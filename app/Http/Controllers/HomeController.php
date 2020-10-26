<?php

namespace App\Http\Controllers;

use App\Services\Bitrix;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $entries = $user->entriesByEmail;
        $bitrix = new Bitrix();
        $entriesStatus = $bitrix->checkLeadStatus($entries);
        return view('home', ['entries' => $entriesStatus]);
    }
}
