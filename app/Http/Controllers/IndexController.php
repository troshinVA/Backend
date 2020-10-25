<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $events = Event::all();
        return view('layouts.main', array('events' => $events));
    }

}
