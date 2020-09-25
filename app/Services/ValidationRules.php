<?php

namespace App\Services;

use Validator;

class ValidationRules
{
    public static function checkValid($request)
    {

        $input = $request->except('_token');
        $rules = [

            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'department' => 'required|max:255',
            'emailAddress' => 'required|email|unique:members',
            'phone' => 'required|max:11|min:11|regex:/(79)[0-9]{9}/',

        ];

        if ($input['checkbox'] == 1) {

            $rules = array_merge(
                $rules, [
                'nameOfThesis' => 'required|max:500',
                'descriptionOfThesis' => 'required|max:1000']
            );

        }else{

            $input['nameOfThesis']='Зритель - не выступает с докладом';
            $input['descriptionOfThesis']='Зритель - не выступает с докладом';

        }

        $validator = Validator::make(
            $input, $rules
        );

        return array($input, $validator);

    }
}
