<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use App\Members;
use Illuminate\View\View;
use App\Services\Bitrix;

/**
 * Class IndexController
 *
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function execute()
    {

        $speakers = Members::all();
        $newBitrix = new Bitrix();
        $speakersStatusUpdate = $newBitrix->checkLeadStatus($speakers);
//        dd($speakersStatusUpdate);
        return view('layouts.main', array('speakers' => $speakersStatusUpdate));

    }
}
