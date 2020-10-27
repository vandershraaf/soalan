<!doctype html>
<html>

@include('includes.header')

<body>

    <div class="container-fluid">

        @include('includes.nav')

        @yield('content')

        @if (isset($slot))
            {{ $slot }}
        @endif

        @include(('includes.footer'))

    </div>

    @livewireScripts
</body>
</html>
