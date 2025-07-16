<!DOCTYPE html>
<html lang="en">

@include('components.head', ['title' => $title ?? 'PPLGIM'])

<body>
    @include('components.header')

    <main>
        @yield('content')
    </main>

    @include('components.footer')
</body>

</html>