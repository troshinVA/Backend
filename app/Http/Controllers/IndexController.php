<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    public function index()
    {
        $events = Event::all();
        return view('layouts.main',array('events'=>$events));
    }

}
