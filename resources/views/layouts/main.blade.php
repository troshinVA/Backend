@extends('layouts.layout')

@section('content')
<header>
    <h1>Доступные конференции</h1>

</header>

<main>

    <div>

        <table border="1">
            <h2></h2><br>

            <tr>
                <th>Название</th>
                <th>Описание</th>
            </tr>

            @if(isset($events) && is_object($events))

                @foreach($events as $event)

                    <tr>
                        <td class="row">
                            <a href="{{route('event',['eventId'=>$event->id])}}"> {{ $event->title }} </a>
                        </td>
                        <td>{{ $event->description }}</td>
                    </tr>

                @endforeach

            @endif

        </table>

    </div>

</main>

@endsection
