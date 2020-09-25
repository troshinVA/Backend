<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Members;


class IndexController extends Controller
{
    public function execute(Request $request)
    {

        $speakers = Members::where('checkbox', '=', 1)->get();
        return view('layouts.main', array('speakers' => $speakers));

    }
}
