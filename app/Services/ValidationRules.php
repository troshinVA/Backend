<?php

namespace App\Services;
use Validator;

class ValidationRules
{
    public static function checkValid($request)
    {
        $input = $request->except('_token');

        if ($input["checkbox"] == 0) {

            $validator = Validator::make(
                $input, [

                'name' => 'required|max:255',
                'lastname' => 'required|max:255',
                'department' => 'required|max:255',
                'emailAddress' => 'required|email|unique:members',
                'phone' => 'required|max:11|min:11|regex:/(79)[0-9]{9}/',

                    ]
            );

            $input["nameOfThesis"] ='Не выступает с докладом - зритель';
            $input["descriptionOfThesis"] ='Не выступает с докладом - зритель';

            return array($input,$validator);

        } else {

            $validator = Validator::make(
                $input, [

                'name' => 'required|max:255',
                'lastname' => 'required|max:255',
                'department' => 'required|max:255',
                'emailAddress' => 'required|email|unique:members',
                'phone' => 'required|max:11|min:11|regex:/(79)[0-9]{9}/',
                'nameOfThesis' => 'required|max:500',
                'descriptionOfThesis' => 'required|max:1000',

                    ]
            );

            return array($input,$validator);

        }
    }
}
