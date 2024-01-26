<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> {{-- allmost all letters in the world --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Product Management System</title>

    @include('libraries.styles')
</head>`

<body style="font-size: 12px;">
    @include('components.nav')

    @yield('content')

    @include('libraries.scripts')
</body>

</html>
