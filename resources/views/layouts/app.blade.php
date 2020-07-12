<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @yield('meta')

    @include('partials.head')

    @yield('links')
</head>
<body>

<div id="app">
<section>
    @include('partials.header')


    <main>
        @yield('content')
    </main>
</section>
</div>

@include('partials.footer')

<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>



