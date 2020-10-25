@extends('layouts.app')

@section('content')
    <main>
        <a href="{{ route('event',['eventId'=>(int)$eventId]) }}" class="btn btn-primary"> Вернуться к списку</a>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h1>{{ $page->nameOfThesis }}</h1>
                    <span class="author">{{ $page->name . ' ' . $page->lastname }}</span>
                    <span class="category">{{ $page->department}}</span>
                </div>
                <div class="card-body">
                    <p class="post-content">{{ $page->descriptionOfThesis }}</p>
                </div>
            </div>

        </div>
    </main>

@endsection


