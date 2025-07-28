<!DOCTYPE html>
<html lang="en">

@include('components.head', ['title' => $title ?? 'PPLGIM'])
<meta name="description"
    content="@yield('meta_description', 'Website resmi untuk menampilkan game terbaik buatan siswa PPLG. Jelajahi koleksi game menarik kami.')">

<body>
    @include('components.header')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    <script>
    feather.replace();
    </script>
</body>

</html>
