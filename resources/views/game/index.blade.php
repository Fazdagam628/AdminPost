@extends('layouts.app')

@section('content')



<div class="hero">
    <h1>World Of Top Works</h1>
    <p>Explore the best game from smkn 11 semarang students. Find the hidden gem.</p>
    <div class="buttons">
        <a href="#container-info" class="btn-yellow">Discover More ↗</a>
        <a href="{{ route('games.game') }}" class="btn-white">All Collections ↗</a>
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

<section id="container-info">
    <div class="container-info">
        <div class="nft-image">
            <img src="{{ asset('/img/Smk-11-smg.png')  }}" alt="smkn 11 semarang">
        </div>
        <div class="nft-details">
            <h1 style="text-align: center;">SMKN 11 Semarang</h1>
            <div class="nft-description">
                <p>
                    Sekolah ini berdiri tahun 1990 dengan nama SMT Negeri Grafika Semarang, sesuai Kepmendikbud No.
                    0389/0/1990 diresmikan pada hari Sabtu Pahing, tanggal 23 Mei 1992 dan berdasarkan Keputusan
                    Departemen Pendidikan dan Kebudayaan Kodya Semarang mendapatkan Nomor Statistik Sekolah (NSS)
                    551036304001.
                    <br>
                    </br>
                    Pada tahun 1997 berdasarkan Keputusan Menteri Pendidikan dan Kebudayaan RI Nomor 036/O/1997 tentang
                    perubahan Nomenklatur SMKTA menjadi SMK serta organisasi dan tata kerja SMK, maka SMT Negeri Grafika
                    Semarang berubah menjadi SMK Negeri 11 Semarang.
                    <br>
                    </br>
                    Sesuai kebijakan pemerintah dalam pengembangan Sekolah Menengah Kejuruan, SMK Negeri 11 Semarang
                    dalam perkembanganya ditetapkan Menjadi SMK RSBI-INVEST pada tahun 2009 sampai dengan tahun 2012,
                    SMK Negeri 11 Semarang dijadikan Sekolah Rujukan pada tahun 2016, SMKN 11 Semarang ditetapkan
                    sebagai SMK Revitalisasi tahun 2019 sampai dengan tahun 2020, SMKN 11 Semarang ikut menerapkan
                    Gerakan Sekolah Menyenangkan (GSM) pada tahun 2019, ditetapkan menjadi Sekolah yang menerapkan Zona
                    Integritas – Wilayah Bebas Korupsi (ZI-WBK) pada tahun 2019 sampai dengan tahun 2022.
                    <br>
                    </br>
                    Pada tahun 2022 SMK Negeri 11 Semarang setelah melalui tahapan seleksi ditetapkan sebagai SMK Pusat
                    Keunggulan (SMK-PK) Reguler dan Pemadanan kemudian dilanjutkan program SMK Pusat Keunggulan (SMK-PK)
                    Reguler Lanjutan pada tahun 2023.
                </p>
            </div>
        </div>
    </div>
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