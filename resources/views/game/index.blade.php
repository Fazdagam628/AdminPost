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
    <h2>Discover Item</h2>
    @livewire('game-filter')

</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
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