<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie_edge">
    <title>{{$metaTitle ?? 'DefaultTitle'}}</title>
    <meta name="description" content="{{$metaDescription ?? 'Default Description'}}">


</head>
<body class="font-sans antialiased dark:big-black dark:text-white/50">
<x-partials.navigation/>
@session('status')
<div>
    {{ $value }}
</div>
@endsession
{{$slot}}
@isset($sidebar)
    <!--no hace falta ek if porque el blade este lo traduce al if-->

    <div id="sidebar">
        <h3>Sidebar</h3>
        {{$sidebar}}
    </div>
@endisset
</body>
</html>
