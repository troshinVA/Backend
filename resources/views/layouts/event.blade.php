@extends('layouts.layout')

@section('content')
<header>
    <h1>{{$event->title}}</h1>
</header>

<main>

    <button class="button"><a href="{{ route('list',['eventId'=> $event->id]) }}">Список участников</a></button> <br> <br>

    <div>
        <button class="button"><a href="{{ route('form',['eventId'=>$event->id]) }}">Хочу на конференцию!</a></button>
        <table border="1">
            <h2>Доклады</h2><br>

            <tr>
                <th>Тема доклада</th>
                <th>Докладчик</th>
                <th>Подразделение</th>
            </tr>

            @if(isset($entries) && is_object($entries))

                @foreach($entries as $entry)

                    @if ($entry->status === 0 && $entry->nameOfThesis !== null && $entry->bitrix_id !== null)

                        <tr class="not-processed">
                            <td class="not-processed">
                                {{ $entry->nameOfThesis }}
                            </td>
                            <td>{{$entry->name}} {{$entry->lastname}}</td>
                            <td>{{ $entry->department }}</td>
                        </tr>
                    @elseif ($entry->nameOfThesis !== null && $entry->bitrix_id !== null)
                        <tr>
                            <td class="row">
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

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            <p>{{ Session::get('status') }}</p>
        </div>
    @endif
<br><br>
    <button class="button small left"><a href="{{ route('main') }}">Назад к выбору конференций</a></button> <br> <br>

</main>

@endsection

