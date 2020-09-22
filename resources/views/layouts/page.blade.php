<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <link href="{{ asset('css/page_style.css') }}" rel="stylesheet" type="text/css">

    <title>{{ $title }}</title>


</head>
<body>
<main>
    <a href="{{ route('home') }}" class="button"> <-- Вернуться к списку</a>
    <div class="container">
        <div class="post">
            <div>
                <div class="post-header">
                    <h1>{{ $title }}</h1>
                    <div class="post-meta">
                        <span class="author">{{ $speaker }}</span>
                        <span class="category">{{ $department }}</span>
                    </div>
                </div>
                <p class="post-content">{{ $description }}
                </p>
            </div>
        </div>
    </div>


</main>



