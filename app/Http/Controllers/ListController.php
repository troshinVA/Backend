<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Members;
use Illuminate\View\View;

/**
 * Class ListController
 *
 * @package App\Http\Controllers
 */
class ListController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function execute()
    {

        if (view()->exists('layouts.list')) {

            $members = Members::all();
            return view('layouts.list', array('members' => $members));

        }


    }


}
