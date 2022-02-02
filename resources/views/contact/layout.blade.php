
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laravel 8 CRUD Application') }}
        </h2>


    </x-slot>
<html>
    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    </head>
    <body>

    <div class="container">
        @yield('content')

    </div>

    </body>
    </html>
</x-app-layout>
