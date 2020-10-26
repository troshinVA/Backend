<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class FormValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [

            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'department' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|max:11|min:11|regex:/(79)[0-9]{9}/',

        ];
        //        dd($this->validationData());
        if ($this->validationData()['checkbox'] == 1) {

            $rules = array_merge(
                $rules, [
                    'nameOfThesis' => 'required|max:500',
                    'descriptionOfThesis' => 'required|max:1000']
            );

        }
        return $rules;
    }
}
