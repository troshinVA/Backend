@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="h1">{{$event->title}}</h1>
        <nav class="navbar">
            <a href="{{ route('list',['eventId'=> $event->id]) }}"  class="btn btn-primary">
                Список участников</a>
            <a  href="{{ route('form',['eventId'=>$event->id]) }}" class="btn btn-success" >
                Хочу на конференцию!</a>
        </nav>
        <div class="card">
            <div class="card-header"><h4>Доклады</h4></div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th class="thead-default">Тема доклада</th>
                        <th class="thead-default">Докладчик</th>
                        <th class="thead-default">Подразделение</th>
                    </tr>

                    @if(isset($entries) && is_object($entries))

                        @foreach($entries as $entry)

                            @if ($entry->status === 0 && $entry->nameOfThesis !== null && $entry->bitrix_id !== null)

                                <tr class="table-active">
                                    <td>
                                        {{ $entry->nameOfThesis }}
                                    </td>
                                    <td>{{$entry->name}} {{$entry->lastname}}</td>
                                    <td>{{ $entry->department }}</td>
                                </tr>
                            @elseif ($entry->nameOfThesis !== null && $entry->bitrix_id !== null)
                                <tr>
                                    <td class="table-info">
                                        <a href="{{route('page',['pageId'=>$entry->id,'eventId'=>$event->id])}}"> {{ $entry->nameOfThesis }} </a>
                                    </td>
                                    <td>{{$entry->name}} {{$entry->lastname}}</td>
                                    <td>{{ $entry->department }}</td>
                                </tr>
                            @endif
                        @endforeach

                    @endif

                </table>
            </div>
        </div>
    </div>

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            <p>{{ Session::get('status') }}</p>
        </div>
    @endif
    <br>
    <a href="{{ route('main') }}" class="btn btn-primary">Назад к выбору конференций</a> <br>
@endsection

