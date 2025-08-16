@extends('layouts.app')
@section('meta_description', 'Detail lengkap asset: '.$asset->name. ' Views : '.$asset->views)
@section('content')

<div class="container">
    <div class="nft-image">
        <img src="{{ asset('/storage/'.$asset->image_cover)  }}" alt="NFT Preview">
    </div>
    <div class="nft-details">
        <h1>{{ $asset->name }}</h1>
        <div class="nft-meta">Posted by: {{ $asset->author }}</div>
        <div class="nft-meta">View: {{ $asset->views }}</div>
        <div class="nft-meta">Published: {{ \Carbon\Carbon::parse($asset->created_at)->format('d M Y') }}</div>
        <div class="nft-description">
            {{ $asset->description }}
        </div>
        <div class="nft-properties">
            <h2>Kategori</h2>
            <div class="property-grid">
                @foreach ($asset->category as $item)
                <div class="property-card">
                    <strong>{{ $item}}</strong><br>
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
        @forelse ($asset->image as $image_asset)
        <div class="related-card">
            <img src="{{ asset('/storage/' . $image_asset) }}" alt="Screenshot">
        </div>
        @empty
        <p>Tidak ada dokumentasi tersedia.</p>
        @endforelse
    </div>
</section>


@endsection
