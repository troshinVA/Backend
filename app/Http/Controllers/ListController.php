<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Members;

class ListController extends Controller
{

    public function execute()
    {

        if (view()->exists('layouts.list')) {

            $members = Members::all();
            return view('layouts.list', array('members' => $members));

        }


    }


}
