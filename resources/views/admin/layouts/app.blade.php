<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @yield('meta')

    @include('partials.head')

    @yield('links')
</head>
<body>

<div id="app">

    @include('partials.header')


    <main>
        @yield('content')
    </main>

</div>
@include('partials.footer')
</body>
</html>


@stack('scripts')

