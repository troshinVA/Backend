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

<form action="{{ route('form') }}" method="post">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="name-field" class="col-xs-2 control-label"> Имя </label>

        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="col-xs-8">
            <input type="text" name="name" value="{{ old('name') }}" id="name-field" placeholder="Введите имя" class="textbox">
        </div>

    </div>

    <div class="form-group">
        <label for="lastname-field" class="col-xs-2 control-label"> Фамилия </label>

        @error('lastname')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="col-xs-8">
            <input type="text" name="lastname" value="{{ old('lastname') }}" id="lastname-field" placeholder="Введите фамилию" class="textbox">
        </div>

    </div>

    <div class="form-group">
        <label for="department-field" class="col-xs-2 control-label"> Подразделение </label>

        @error('department')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="col-xs-8">
            <input type="text" name="department" value="{{ old('department') }}" id="department-field" placeholder="Название подразделения"
                   class="textbox">
        </div>

    </div>

    <div class="form-group">
        <label for="email-field" class="col-xs-2 control-label"> E-mail </label>

        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="col-xs-8">
            <input type="text" name="email" value="{{ old('emailAddress') }}" id="email-field" placeholder="Введите e-mail" class="textbox">
        </div>

    </div>

    <div class="form-group">
        <label for="phone-field" class="col-xs-2 control-label"> Номер телефона </label>

        @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="col-xs-8">
            <input type="text" name="phone" value="{{ old('phone') }}" id="phone-field" placeholder="79XXXXXXXXX" class="textbox">
        </div>

    </div>

    <div class="form-group">
        <div class="col-xs-8">
            <label for="radio1">Хочу быть докладчиком!</label>
            <input type="radio" value="1" name="isThesis" id="radio1" class="radio" checked>
        </div>

        <div class="col-xs-8">
            <label for="radio2">Приду просто посмотреть</label>
            <input type="radio" value="0" name="isThesis" id="radio2" class="radio">
        </div>


    </div>
    <br><br>


    <div class="visible" id="hidden">


        <label for="thesis-field" class="col-xs-2 control-label">Тема доклада</label>

        @error('nameOfThesis')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input type="text" placeholder="Тема доклада" value="{{ old('nameOfThesis') }}" class="textbox" id="thesis-field" name="nameOfThesis">


        <label for="description-field" class="col-xs-2 control-label">Описание доклада</label>

        @error('thesisDescription')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <textarea type="text" rows=7 class="message"  id="description-field" name="thesisDescription">
          {{ old('thesisDescription') }}  </textarea>

    </div>


    <input type="submit" value="Регистрация" class="button">

</form>

<a class="button" href="{{ route('home')}}">Назад</a>

<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

</body>


</html>
