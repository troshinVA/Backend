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

            // dd(array('members'=>$members));

            return view('layouts.list', array('members' => $members));
        }


    }


}
