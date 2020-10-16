<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{ asset('js/form.js') }}"></script>
    <title>Конференция 2020</title>
</head>


<body class="main">
<header>
    <h1>Конференция 2020</h1>
</header>

<main>

    <button class="button"><a href="{{ route('list') }}">Список участников</a></button>
    <button class="button"><a href="{{ route('form') }}">Хочу на конференцию!</a></button>


    <div>

        <table border="1">
            <h2>Доклады</h2><br>

            <tr>
                <th>Тема доклада</th>
                <th>Докладчик</th>
                <th>Подразделение</th>
            </tr>

            @if(isset($speakers) && is_object($speakers))

                @foreach($speakers as $speaker)

                    @if ($speaker->status == '0' && $speaker->nameOfThesis !== null)

                        <tr class="not-processed">
                            <td class="not-processed">
                                {{ $speaker->nameOfThesis }}
                            </td>
                            <td>{{$speaker->name}} {{$speaker->lastname}}</td>
                            <td>{{ $speaker->department }}</td>
                        </tr>

                    @elseif ($speaker->nameOfThesis !== null)

                        <tr>
                            <td class="row"><a
                                    href="{{route('page',array('id'=>$speaker->id))}}"> {{ $speaker->nameOfThesis }} </a>
                            </td>
                            <td>{{$speaker->name}} {{$speaker->lastname}}</td>
                            <td>{{ $speaker->department }}</td>
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

</main>


</body>
</html>
