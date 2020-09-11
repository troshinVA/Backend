<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Members;

class FormController extends Controller
{
    public function execute(Request $request){

		if ($request->isMethod('post')){

		    $input = $request->except('_token');


		    	if ($input["checkbox"] == 0) {
		    		
		    		$input["nameOfThesis"] ='Не выступает с докладом - зритель';
		    		$input["descriptionOfThesis"] ='Не выступает с докладом - зритель';


		    		$validator = Validator::make($input,[

		    		'name' => 'required|max:255',
		    		'lastname' => 'required|max:255',
		    		'department' => 'required|max:255',
		    		'emailAddress' => 'required|email|unique:members',
		    		'phone' => 'required|max:11|min:11|regex:/(79)[0-9]{9}/',	

		    		]);

		    			if($validator->fails()){

		    				return redirect()->route('form')
		    				->withErrors($validator)
		    				->withInput();
		    			}

		    			

				} else {

							$validator = Validator::make($input,[

					    			'name' => 'required|max:255',
					    			'lastname' => 'required|max:255',
					    			'department' => 'required|max:255',
					    			'emailAddress' => 'required|email|unique:members',
					    			'phone' => 'required|max:11|min:11|regex:/(79)[0-9]{9}/',
					    			'nameOfThesis' => 'required|max:500',
					    			'descriptionOfThesis' => 'required|max:1000',

					    			]);

									if($validator->fails()){

					    				return redirect()->route('form')
					    				->withErrors($validator)
					    				->withInput();

					    			}

		    		
		    	}


		    	// Bitrix

		    		 $queryUrl = 'https://b24-7ksfpt.bitrix24.ru/rest/1/ujv8h0f4nnp3o0z4/crm.lead.add.json';
				 	 $queryData = http_build_query(array(
 					'fields' => array(
 					"TITLE" => "Заявка от: " . $input["name"] . " " . $input["lastname"],
 					"LAST_NAME" => $input["lastname"],
 					"NAME" => $input["name"],
 					"PHONE" => array(array("VALUE" => $input["phone"], "VALUE_TYPE" => "WORK" )),
 					"EMAIL" => array(array("VALUE" => $input["emailAddress"], "VALUE_TYPE" => "WORK" )),
 					"UF_CRM_1599747566" => $input["department"],
 					"UF_CRM_1599747582" => $input["nameOfThesis"],
 					"SOURCE_DESCRIPTION" => "CRM-форма",
 					),
 					'params' => array("REGISTER_SONET_EVENT" => "Y")
 					));

				 	 

				 	 $curl = curl_init();
					 curl_setopt_array($curl, array(
					 CURLOPT_SSL_VERIFYPEER => 0,
					 CURLOPT_POST => 1,
					 CURLOPT_HEADER => 0,
					 CURLOPT_RETURNTRANSFER => 1,
					 CURLOPT_URL => $queryUrl,
					 CURLOPT_POSTFIELDS => $queryData,
					 ));

					 $result = curl_exec($curl);
					 curl_close($curl);
					 $result = json_decode($result, 1);


		    	$members = new Members();

		    	$members->fill($input);


		    	if ($members->save()){

					 

					 return redirect()->route('home')->with('status','Спасибо, Вы зарегистрированы на конференцию');
		    	}
   		}


   		 			if(view()->exists('layouts.form')){


			    		return view('layouts.form');

			    	}


   	}	
}


