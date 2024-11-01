<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    @livewireStyles
</head>

<body>
    <div>
        <h1>test site </h1>
    </div>

    {{ $slot }}

    @livewireScripts
</body>

</html>