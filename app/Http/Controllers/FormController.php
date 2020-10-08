<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Services\ValidationRules;
use App\Services\Bitrix;
use App\Members;
use App\Http\Requests\FormValidation;
use Illuminate\View\View;

/**
 * Class FormController
 *
 * @package App\Http\Controllers
 */
class FormController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function getForm()
    {

        return view('layouts.form');

    }

    public function postForm(FormValidation $request){

        $input = $request->except('_token');

        $request->validated();

        $members = new Members();
        $members->fill($input);

        if ($members->save()) {

            $newLead = new Bitrix;
            $queryData = $newLead->setData($input);   // set Lead's data to further transmitting to Bitrix
            $newLead->createLead($queryData, env('BITRIX_URL'));   // put new Lead to Bitrix

            return redirect()->route('home')->with('status', 'Спасибо, Вы зарегистрированы на конференцию');
        }

    }
}

