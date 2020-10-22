<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Конференция 2020</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">


</head>

<body class="form">

<h1>Регистрация на конференцию.</h1>

<!-- Форма регистрации  -->

{!! Form::open(['url'=>route('form',['eventId'=>$eventId]),'class'=>'form-horizontal','method'=>'POST']) !!}

{{ csrf_field() }}


<div class="form-group">
    {!! Form::label('name','Имя',['class'=>'col-xs-2 control-label']) !!}

    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="col-xs-8">
        @if($user != null)
            {!! Form::text('name', old('name',$user->name),['class'=>'textbox','placeholder'=>'Введите имя','autofocus'=>'true']) !!}

        @else
            {!! Form::text('name', old('name'),['class'=>'textbox','placeholder'=>'Введите имя','autofocus'=>'true']) !!}
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('lastname','Фамилия',['class'=>'col-xs-2 control-label']) !!}

    @error('lastname')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="col-xs-8">
        {!! Form::text('lastname', old('lastname'),['class'=>'textbox','placeholder'=>'Введите фамилию']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('department','Подразделение',['class'=>'col-xs-2 control-label']) !!}

    @error('department')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="col-xs-8">
        {!! Form::text('department', old('department'),['class'=>'textbox','placeholder'=>'Название подразделения']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('email','E-mail',['class'=>'col-xs-2 control-label']) !!}

    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="col-xs-8">
        @if ($user != null)
            {!! Form::text('email', old('email',$user->email),['class'=>'textbox','placeholder'=>'Введите e-mail']) !!}
        @else
            {!! Form::text('email', old('email'),['class'=>'textbox','placeholder'=>'Введите e-mail']) !!}
        @endif
    </div>
</div>


<div class="form-group">
    {!! Form::label('phone','Номер телефона',['class'=>'col-xs-2 control-label']) !!}

    @error('phone')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="col-xs-8">
        {!! Form::text('phone', old('phone'),['class'=>'textbox','placeholder'=>'79XXXXXXXXX','type'=>'tel']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('event','Выберите конференцию',['class'=>'col-xs-2 control-label']) !!}

    <div class="col-xs-8">
        {!! Form::select('event_id', $events, $eventId,['class'=>'textbox']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-xs-8">
        {!! Form::label('checkbox','Хочу быть докладчиком!') !!}
        {!! Form::radio('checkbox', '1' ,true,['class'=>'radio','id'=>'radio']) !!}
    </div>

    <div class="col-xs-8">
        {!! Form::label('checkbox',' Приду просто посмотреть') !!}
        {!! Form::radio('checkbox', '0' ,false,['class'=>'radio','id'=>'radio']) !!}
    </div>

    {!! Form::hidden('status' ,'0', ['class'=>'status','value'=>'0']) !!}

</div>
<br><br>


<div class="visible" id="hidden">


    {!! Form::label('nameOfThesis','Тема доклада') !!}

    @error('nameOfThesis')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    {!! Form::text('nameOfThesis',old('nameOfThesis'),['class'=>'textbox here','placeholder'=>'Тема доклада']) !!}


    {!! Form::label('descriptionOfThesis','Краткое описание доклада') !!}

    @error('descriptionOfThesis')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    {!! Form::textarea('descriptionOfThesis', old('descriptionOfThesis'),['class'=>'message','placeholder'=>'Описание','id'=>'descriptionThesis']) !!}

</div>

<div>
    {!! Form::button('Регистрация',['class'=>'button','type'=>'submit']) !!}
</div>

{!! Form::close() !!}


<a class="button small left" href="{{ route('event',['eventId' => $eventId])}}">Назад</a>

<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

</body>

</html>
