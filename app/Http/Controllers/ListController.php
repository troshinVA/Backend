<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
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
     * @return Application|Factory|View
     */
    public function execute()
    {

        if (view()->exists('layouts.list')) {

            $members = Members::all();
            return view('layouts.list', array('members' => $members));

        }

    }

}
