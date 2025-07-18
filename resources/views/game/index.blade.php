@extends('layouts.app')

@section('content')



<div class="hero">
    <h1>World Of Top Works</h1>
    <p>Explore the best game from smkn 11 semarang students. Find the hidden gem.</p>
    <div class="buttons">
        <a href="#" class="btn-yellow">Discover More ↗</a>
        <a href="#" class="btn-white">All Collections ↗</a>
    </div>
</div>

<!-- Swiper -->
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        @forelse ($games as $game)
        <div class="swiper-slide">
            <a href="{{ route('games.show', $game->id) }}">
                <img src="{{ asset('/storage/'.$game->image) }}" />
                <p>{{ $game->name }}<br> </p>
            </a>
        </div>
        @empty
        @endforelse
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

<!-- Filter & Item List -->
<section class="filter-section">
    <h2>Explore Games</h2>
    <div class="filters">
        <form id="filterForm" method="GET" action="{{ route('games.index') }}">
            <select name="kategori" id="kategori">
                <option>Category</option>
                <option value="">All Categories</option>
                @foreach ($allCategories as $category)
                <option value="{{ $category }}" {{ request('kategori') == $category ? 'selected' : '' }}>
                    {{ $category }}
                </option>
                @endforeach
            </select>
        </form>
    </div>
    <div class="item-grid">
        @forelse ($games as $game)

        <div class="item-card">
            <a style="text-decoration:none; color:white;" href="{{ route('games.show', $game->id) }}">
                <img src="{{ asset('/storage/'.$game->image) }}" alt="Art 5">
                <p><strong>{{ $game->name }}</strong></p>
                <small>Posted by: {{ $game->creator }}</small>
            </a>
        </div>
        @empty

        @endforelse
    </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    document.getElementById('kategori').addEventListener('change', function() {
        const selectedValue = this.value;
        if (selectedValue === '') {
            // Redirect tanpa query string
            window.location.href = "{{ route('games.index') }}";
        } else {
            // Submit form normal dengan query kategori
            document.getElementById('filterForm').submit();
        }
    });

    const swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        }
    });
</script>
@endsection