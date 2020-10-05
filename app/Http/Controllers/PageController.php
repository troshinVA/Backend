<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Members;
use Illuminate\View\View;

/**
 * Class PageController
 *
 * @package App\Http\Controllers
 */
class PageController extends Controller
{
    /**
     * @param  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function execute($id)
    {

        if (!$id) {

            abort(404);

        }

        if (view()->exists('layouts.page')) {

            $page = Members::where('id', strip_tags($id))->first();

            $data = [

                'title' => $page->nameOfThesis,
                'speaker' => $page->name . ' ' . $page->lastname,
                'department' => $page->department,
                'description' => $page->descriptionOfThesis,

            ];

            return view('layouts.page', $data);

        }

    }
}
