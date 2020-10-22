@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Личный кабинет') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="form-group row mb-0">
                            <a href="{{ route('main') }}"><button class="btn btn-primary">Список конференций </button></a>
                        </div>

                        <br>

                        <h1> Поданые заявки </h1>
                        <table border="1">
                            <h2></h2><br>

                            <tr>
                                <th>Название</th>
                                <th>Описание</th>
                                <th>Статус участника</th>

                            </tr>
                            @foreach($entries as $entry)
                                <tr>
                                    <td>
                                        <a href="{{route('event',['eventId'=>$entry->events->id])}}"> {{ $entry->events->title }} </a>
                                    </td>
                                    <td>{{ $entry->events->description }}</td>
                                    @if ($entry->nameOfThesis != null)
                                        <td>Докладчик</td>
                                    @else
                                        <td>Зритель</td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection