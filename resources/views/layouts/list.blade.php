@extends('layouts.layout')

@section('content')
<header>
    <h1>{{$event->title}}</h1>
</header>

<main>

    <button class="button"><a href="{{ route('event',['eventId'=>$eventId]) }}">Список докладчиков</a></button> {{--<br> <br>--}}

{{--    <button class="button"><a href="{{ route('form') }}">Хочу на конференцию!</a></button>--}}

    <br><br>

    <div>

        <table border="1">
            <h2>Участники конференции</h2>

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
</main>

@endsection
