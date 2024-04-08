<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}}</title>
    @vite([
        'resources/css/app.css',
        'resources/ts/app.ts',
    ])
</head>

<body>
{{--Just for debugging--}}
<input id="session" type="hidden" value="{{$session}}">
<input id="csrf" type="hidden" value="{{csrf_token()}}">

<!-- main vue component -->
<div id="app">

</div>

</body>
</html>
