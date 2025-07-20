@extends('layouts.app')

@section('content')

<div class="container">
    <div class="nft-image">
        <img src="{{ asset('/storage/'.$game->image)  }}" alt="NFT Preview">
    </div>
    <div class="nft-details">
        <h1>{{ $game->name }}</h1>
        <div class="nft-meta">Posted by: {{ $game->creator }}</div>
        <div class="nft-meta">View: {{ $game->views }}</div>
        <div class="nft-actions">
            <a href="{{ $game->link_download }}" target="_blank"><button>Download</button></a>
        </div>
        <div class="nft-description">
            {{ $game->keterangan }}
        </div>
        <div class="nft-properties">
            <h2>Kategori</h2>
            <div class="property-grid">
                @foreach ($game->kategori as $item)
                <div class="property-card">
                    <strong>{{ $item['kategori']}}</strong><br>
                </div>
                @endforeach
                <!-- <div class="property-card">
                        <strong>Vehicle</strong><br>
                    </div>
                    <div class="property-card">
                        <strong>Rarity</strong><br>
                    </div>
                    <div class="property-card">
                        <strong>Edition</strong><br>
                    </div> -->
            </div>
        </div>
    </div>
</div>

<section class="related-section">
    <h2>Dokumentasi gim</h2>
    <div class="related-items">
        @forelse ($game->img_ss as $ss)
        <div class="related-card">
            <img src="{{ asset('/storage/' . $ss) }}" alt="Screenshot">
        </div>
        @empty
        <p>Tidak ada dokumentasi tersedia.</p>
        @endforelse
    </div>
</section>


<section class="video-section">
    <h2>Preview Video</h2>
    <div class="video-wrapper">
        <iframe
            src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::beforeLast(\Illuminate\Support\Str::after($game->link_youtube, 'v='), '&') }}"
            allowfullscreen>
        </iframe>

    </div>
</section>
@endsection