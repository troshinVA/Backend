@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1>Регистрация на конференцию.</h1>
                        <!-- Форма регистрации  -->
                        {!! Form::open(['url'=>route('form',['eventId'=>$eventId]),'method'=>'POST']) !!}

                        {{ csrf_field() }}
                        <div class="form-group">
                            {!! Form::label('name','Имя') !!}
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @if($user != null)
                                {!! Form::text('name', old('name',$user->name),['class'=>'form-control','placeholder'=>'Введите имя','autofocus'=>'true']) !!}
                            @else
                                {!! Form::text('name', old('name'),['class'=>'form-control','placeholder'=>'Введите имя','autofocus'=>'true']) !!}
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('lastname','Фамилия') !!}
                            @error('lastname')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            {!! Form::text('lastname', old('lastname'),['class'=>'form-control','placeholder'=>'Введите фамилию']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('department','Подразделение') !!}
                            @error('department')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            {!! Form::text('department', old('department'),['class'=>'form-control','placeholder'=>'Название подразделения']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email','E-mail') !!}
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @if ($user != null)
                                {!! Form::text('email', old('email',$user->email),['class'=>'form-control','placeholder'=>'Введите e-mail']) !!}
                            @else
                                {!! Form::text('email', old('email'),['class'=>'form-control','placeholder'=>'Введите e-mail']) !!}
                            @endif
                        </div>


                        <div class="form-group">
                            {!! Form::label('phone','Номер телефона') !!}
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            {!! Form::text('phone', old('phone'),['class'=>'form-control','placeholder'=>'79XXXXXXXXX','type'=>'tel']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('event','Выберите конференцию',['class'=>'col-xs-2 control-label']) !!}

                            <div class="col-xs-8">
                                {!! Form::select('event_id', $events, $eventId,['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-check">
                            {!! Form::radio('checkbox', '1' ,true,['class'=>'form-check-input','id'=>'radio1']) !!}
                            {!! Form::label('checkbox','Хочу быть докладчиком!',['class'=>'form-check-label','for'=>'radio1']) !!}
                        </div>
                        <div class="form-check">
                            {!! Form::radio('checkbox', '0' ,false,['class'=>'form-check-input','id'=>'radio2']) !!}
                            {!! Form::label('checkbox',' Приду просто посмотреть',['class'=>'form-check-label','for'=>'radio2']) !!}
                        </div>

                        {!! Form::hidden('status' ,'0', ['class'=>'status','value'=>'0']) !!}


                        <br><br>

                        <div class="visible" id="hidden">
                            <div class="form-group">
                                {!! Form::label('nameOfThesis','Тема доклада') !!}
                                @error('nameOfThesis')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                {!! Form::text('nameOfThesis',old('nameOfThesis'),['class'=>'form-control text','placeholder'=>'Тема доклада']) !!}

                                {!! Form::label('descriptionOfThesis','Краткое описание доклада') !!}
                                @error('descriptionOfThesis')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                {!! Form::textarea('descriptionOfThesis', old('descriptionOfThesis'),['class'=>'form-control textarea','placeholder'=>'Описание','id'=>'descriptionThesis']) !!}
                            </div>
                        </div>

                        <nav class="navbar">
                            <a class="btn btn-primary" href="{{ route('event',['eventId' => $eventId])}}">Назад</a>
                            {!! Form::button('Регистрация',['class'=>'btn btn-success','type'=>'submit']) !!}
                        </nav>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
