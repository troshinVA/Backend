<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Members;
use Illuminate\View\View;

/**
 * Class IndexController
 *
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    /**
     * @param  Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function execute(Request $request)
    {

        $speakers = Members::where('checkbox', '=', 1)->get();
        return view('layouts.main', array('speakers' => $speakers));

    }
}
