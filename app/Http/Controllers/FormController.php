<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ValidationRules;
use App\Services\Bitrix;
use App\Members;

class FormController extends Controller
{
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

                Bitrix::setLeadParameters($input);
                return redirect()->route('home')->with('status', 'Спасибо, Вы зарегистрированы на конференцию');
            }

        }

        if (view()->exists('layouts.form')) {
            return view('layouts.form');
        }

    }

}
