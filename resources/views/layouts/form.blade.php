<!DOCTYPE html>
<html lang="en">
	  <head>
	    <meta charset="utf-8">
	    <title>Конференция 2020</title>
	    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

	   
	  </head>

		 <body class="form">

			<h1>Регистрация на конференцию.</h1>

			<!-- Отображение ошибок в вводе -->

			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
					<!-- Форма регистрации  -->

					{!! Form::open(['url'=>route('form'),'class'=>'form-horizontal','method'=>'POST']) !!}

						<div class="form-group">
							{!! Form::label('name','Имя',['class'=>'col-xs-2 control-label']) !!}
							<div class="col-xs-8">
								{!! Form::text('name', old('name'),['class'=>'textbox','placeholder'=>'Введите имя']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('lastname','Фамилия',['class'=>'col-xs-2 control-label']) !!}
							<div class="col-xs-8">
								{!! Form::text('lastname', old('lastname'),['class'=>'textbox','placeholder'=>'Введите фамилию']) !!}
							</div>
						</div>


						<div class="form-group">
							{!! Form::label('department','Подразделение',['class'=>'col-xs-2 control-label']) !!}
							<div class="col-xs-8">
								{!! Form::text('department', old('department'),['class'=>'textbox','placeholder'=>'Название подразделения']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('emailAddress','E-mail',['class'=>'col-xs-2 control-label']) !!}
							<div class="col-xs-8">
								{!! Form::text('emailAddress', old('emailAddress'),['class'=>'textbox','placeholder'=>'Введите e-mail']) !!}
							</div>
						</div>


						<div class="form-group">
							{!! Form::label('phone','Номер телефона',['class'=>'col-xs-2 control-label']) !!}
							<div class="col-xs-8">
								{!! Form::text('phone', old('phone'),['class'=>'textbox','placeholder'=>'79XXXXXXXXX']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-8">
								{!! Form::label('checkbox','Хочу быть докладчиком!') !!}
								{!! Form::radio('checkbox', '1' ,true,['class'=>'radio1', 'onclick'=>
								'enable()']) !!} 
							</div>

							<div class="col-xs-8">
								{!! Form::label('checkbox',' Приду просто посмотреть') !!}
								{!! Form::radio('checkbox', '0' ,false,['class'=>'radio2', 'onclick'=>
								'disable()']) !!}
							</div>

						</div>
							<br><br>


							<div class="visible" id="hidden">

								

									{!! Form::label('nameOfThesis','Тема доклада') !!}
									
									{!! Form::text('nameOfThesis',old('nameOfThesis'),['class'=>'textbox','placeholder'=>'Тема доклада']) !!}
								
						
									{!! Form::label('descriptionOfThesis','Краткое описание доклада') !!}

									
									{!! Form::textarea('descriptionOfThesis', old('descriptionOfThesis'),['class'=>'message','placeholder'=>'Описание']) !!}
									
								

							</div>
							

						<div>
						{!! Form::button('Регистрация',['class'=>'button','type'=>'submit']) !!}
						</div>

					{!! Form::close() !!}



				<a  class="button" href="{{ route('home')}}">Назад</a>

		<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>		
 		<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

		</body>

		
</html>



