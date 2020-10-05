<?php

namespace App\Services;

use Validator;

/**
 * Class ValidationRules
 *
 * @package App\Services
 */
class ValidationRules
{
    /**
     * @param  $input
     * @return mixed $validator
     */
    public static function checkValid($input)
    {

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

        }

        $validator = Validator::make(
            $input, $rules
        );

        return ($validator);

    }
}
