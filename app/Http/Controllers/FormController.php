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

            $input = ValidationRules::checkValid($request)[0];
            $validator = ValidationRules::checkValid($request)[1];

            if ($validator->fails()) {

                return redirect()->route('form')
                    ->withErrors($validator)
                    ->withInput(
                        $request->except('_token', 'checkbox')
                    );
            }

                Bitrix::setLead($input);

                $members = new Members();
                $members->fill($input);
            if ($members->save()) {
                 return redirect()->route('home')->with('status', 'Спасибо, Вы зарегистрированы на конференцию');
            }

        }

        if (view()->exists('layouts.form')) {
            return view('layouts.form');
        }

    }



}
