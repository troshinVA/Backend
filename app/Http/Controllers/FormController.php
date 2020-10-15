<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use App\Services\Bitrix;
use App\Members;
use App\Http\Requests\FormValidation;
use Illuminate\Http\RedirectResponse;
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

    /**
     * @param  FormValidation $request
     * @return RedirectResponse
     */
    public function postForm(FormValidation $request)
    {

        $input = $request->except('_token');

        $request->validated();

        $members = new Members();
        $members->fill($input);

        if ($members->save()) {

            $newLead = new Bitrix;
            $newLead->addLead($input);   // put new Lead to Bitrix

            return redirect()->route('home')->with('status', 'Спасибо, Вы зарегистрированы на конференцию');
        }

    }
}
