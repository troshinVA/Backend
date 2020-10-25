@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$event->title}}</h1>
        <nav class="navbar">
            <a href="{{ route('event',['eventId'=>$eventId]) }}" class="btn btn-primary stretched-link">Список
                докладчиков</a>
        </nav>
        <div class="card">
            <div class="card-header"><h4>Участники конференции</h4></div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Участник</th>
                        <th>Подразделение</th>
                    </tr>

                    @if(isset($entries) && is_object($entries))
                        @foreach($entries as $entry)
                            @if($entry->bitrix_id !== null)
                                <tr>
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
@endsection
