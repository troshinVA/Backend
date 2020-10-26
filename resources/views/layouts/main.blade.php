@extends('layouts.app')

@section('content')
    <main>

        <div class="container">
            <h1>Доступные конференции</h1>
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive">

                        <tr>
                            <th>Название</th>
                            <th>Описание</th>
                        </tr>

                        @if(isset($events) && is_object($events))

                            @foreach($events as $event)

                                <tr>
                                    <td class="table-info position-relative">
                                        <a href="{{route('event',['eventId'=>$event->id])}}"
                                           class="stretched-link"> {{ $event->title }} </a>
                                    </td>
                                    <td>{{ $event->description }}</td>
                                </tr>

                            @endforeach

                        @endif

                    </table>
                </div>
            </div>
        </div>

    </main>

@endsection
