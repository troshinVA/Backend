<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <title>Список участников.</title>


</head>
<body>

<header>
    <h1>Конференция 2020</h1>
</header>

<main>

    <button class="button"><a href="{{ route('home') }}">Список докладчиков</a></button>

    <button class="button"><a href="{{ route('form') }}">Хочу на конференцию!</a></button>

    <br><br>

    <div>

        <table border="1">
            <h2>Участники конференции</h2>

            <tr>
                <th>Участник</th>

                <th>Подразделение</th>
            </tr>

            @if(isset($members) && is_object($members))

                @foreach($members as $member)
                    @if($member->bitrixId !== null)
                    <tr>

                        <td>{{$member->name}} {{$member->lastname}}</td>
                        <td>{{ $member->department }}</td>
                    </tr>
                    @endif
                @endforeach

            @endif

        </table>

    </div>


</main>

</html>
