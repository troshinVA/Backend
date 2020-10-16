<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use App\Member;
use Illuminate\View\View;
use App\Services\Bitrix;
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

            $members = Member::all();
            $newBitrix = new Bitrix();
            $membersStatusUpdate = $newBitrix->checkLeadStatus($members);
            return view('layouts.list', array('members' => $membersStatusUpdate));

        }

    }

}
