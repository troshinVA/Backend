<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Services\ValidationRules;
use App\Services\Bitrix;
use App\Members;

/**
 * Class FormController
 *
 * @package App\Http\Controllers
 */
class FormController extends Controller
{
    /**
     * @param  Request $request
     * @return \Illuminate\Contracts\Foundation\Application|Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function execute(Request $request)
    {

        if ($request->isMethod('post')) {

            $input = $request->except('_token');
            $validator = ValidationRules::checkValid($input);

            if ($validator->fails()) {

                return redirect()->route('form')
                    ->withErrors($validator)
                    ->withInput(
                        $request->except('_token', 'checkbox')
                    );
            }

            $members = new Members();
            $members->fill($input);

            if ($members->save()) {

                $newLead = new Bitrix;
                $queryData = $newLead->setData($input);   // set Lead's data to further transmitting to Bitrix
                $newLead->createLead($queryData, env('BITRIX_URL'));   // put new Lead to Bitrix

                return redirect()->route('home')->with('status', 'Спасибо, Вы зарегистрированы на конференцию');
            }

        }

        if (view()->exists('layouts.form')) {
            return view('layouts.form');
        }

    }

}
