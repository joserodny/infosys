<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

    <title>Laravel</title>
</head>

<body>
@auth()
@if(auth()->user()->role == 1)
    @include('partials.admin_nav_bar')
@else
    @include('partials._nav')
@endif
@else
    @include('partials._nav')
@endauth
<x-flash-message/>
{{$slot}}
</body>
@stack('js')
</html>

