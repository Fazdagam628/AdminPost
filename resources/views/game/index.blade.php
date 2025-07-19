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

<div class="container-info">
    <div class="nft-image">
        <img src="{{ asset('/img/Smk-11-smg.png')  }}" alt="NFT Preview">
    </div>
    <div class="nft-details">
        <h1>SMKN 11 Semarang</h1>
        <div class="nft-description">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam excepturi, iste quibusdam adipisci iusto,
            quasi nihil veniam, totam deleniti modi obcaecati ipsam aperiam quaerat praesentium magnam necessitatibus
            asperiores nemo quisquam eveniet neque ratione quas. Asperiores officiis est quas dolore impedit nam
            incidunt eos vel iusto voluptatibus ea, id non ad.
        </div>
    </div>
</div>

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
