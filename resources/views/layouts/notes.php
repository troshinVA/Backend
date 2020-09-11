				<form method="POST" action="{{ action('FormController1@store') }}">
				    @csrf

					   <p><label for="name">Имя: </label>
					<input id="name" type="text" class="form-control" placeholder="Введите имя" required>
					<span class="text-danger">{{ $errors->first('name') }}</span>
					</p>

					   <p><label for="lastname">Фамилия : </label>
					<input id="lastname" type="text" class="form-control" placeholder="Введите фамилию">
					</p> 


					  <p>  <label for="emailAddress">e-mail: </label>
					<input id="emailAddress" type="email" class="form-control" placeholder="Введите e-mail" required>
					<span class="text-danger">{{ $errors->first('email') }}</span></p>


					<p><label for="emailAddress">Номер телефона: </label>
					<input id="phone" type="text" class="form-control" placeholder="+79ХХХХХХХХХ" required>
					<span class="text-danger">{{ $errors->first('phone') }}</span></p>    


		      		<p>
					<label><input type="radio" id="a" name="choise" value="1" data-class="js-a" /> Хочу быть докладчиком!</label> 
					<label><input type="radio" id="c" name="choise" value="0" data-class="js-c" /> Приду просто посмотреть </label>
					</p>
  
					 <div  class="js-blocks js-a"> 
					  <fieldset name="thesis" id='thesis'>

							<p><label for="department">Тема доклада: </label>
							<input id="department" type="text" ></p> 
											  
							<p><label for="department">Краткое описание доклада: </label>
							<input id="department" type="text" class="description"></p> 
										    
						</fieldset>
					 </div> 
				
				 <p><input type="submit" ></p>

				</form>











				// if ((is_null($input{'nameOfThesis'}) && is_null($input{'descriptionOfThesis'}){

    		// $validator = Validator::make($input,[

    		// 	'name' => 'required|max:255',
    		// 	'lastname' => 'max:255',
    		// 	'emailAddress' => 'required|email',
    		// 	'phone' => '(+7)[0-9]{10}',	

    		// 	]);

    		// 	if($validator->fails()){

    		// 		return redirect('form')
    		// 		->withErrors($validator)
    		// 		->withInput();
    		// 	}


    			
				// }


				// else {

				// 	$validator = Validator::make($input,[

			 //    			'name' => 'required|max:255',
			 //    			'lastname' => 'max:255',
			 //    			'emailAddress' => 'required|email',
			 //    			'phone' => '(+7)[0-9]{10}',
			 //    			'nameOfThesis' => 'required|max:500',
			 //    			'descriptionOfThesis' => 'required|max:1000'

			 //    			]);

				// 			if($validator->fails()){

			 //    				return redirect()->route('form')->withErrors($validator)->withInput();

			 //    			}

				// 		dd('второе');
			    	

			    	// if(view()->exists('layouts.form')){

			    	// 	return view('layouts.form');


			    	// }

	}
