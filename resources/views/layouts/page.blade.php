@extends('layouts.layout')

@section('content')
<main>
    <button class="button small left"><a href="{{ route('event',['eventId'=>(int)$eventId]) }}"> Вернуться к списку</a></button>
    <div class="container">
        <div class="post">
            <div>
                <div class="post-header">
                    <h1>{{ $page->nameOfThesis }}</h1>
                    <div class="post-meta">
                        <span class="author">{{ $page->name . ' ' . $page->lastname }}</span>
                        <span class="category">{{ $page->department}}</span>
                    </div>
                </div>
                <p class="post-content">{{ $page->descriptionOfThesis }}
                </p>
            </div>
        </div>
    </div>


</main>

@endsection


