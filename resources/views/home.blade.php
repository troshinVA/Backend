@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Личный кабинет') }}</div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="form-group row mb-0">
                    <a href="{{ route('main') }}">
                        <button class="btn btn-primary">Список конференций</button>
                    </a>
                </div>
                <br>
                <h1> Поданые заявки </h1>
                @if (count($entries)==0)
                    <div>Пока что у вас нет ни одной заявки на конференцию(</div>
                @else
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th class="thead-default">Название</th>
                            <th class="thead-default">Описание</th>
                            <th class="thead-default">Статус участника</th>
                            <th class="thead-default">Статус заявки</th>
                        </tr>
                        @foreach($entries as $entry)
                            @if ($entry->status === 0 && $entry->bitrix_id !== null)
                                <tr class="table-active">
                                    <td>
                            @else
                                <tr>
                                    <td class="table-info">
                            @endif
                                        <a href="{{route('event',['eventId'=>$entry->events->id])}}"> {{ $entry->events->title }} </a>
                                    </td>

                            @if ($entry->nameOfThesis != null)
                                <td>Вы зарегестрированы с докладом на
                                    тему: {{$entry->nameOfThesis}} </td>
                                <td>Докладчик</td>
                            @else
                                <td>{{ $entry->events->description }}</td>
                                <td>Зритель</td>
                            @endif

                            @if($entry->status === 0 && $entry->bitrix_id !== null)
                                <td>Заявка в обработке</td>
                            @else
                                <td>Заявка принята</td>
                            @endif
                                </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
