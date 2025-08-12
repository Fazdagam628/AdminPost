@extends('layouts.app')

@section('content')
<div class="container-info">
    <h1> <a class="cerpen-title" href="{{ route('cerpen.index') }}">{{ $cerpen->judul }}</a></h1>
    <div class="nft-meta">
        <span>Penulis: {{ $cerpen->user->name }}</span> |
        <span>Views: {{ $cerpen->views }}</span> |
        <span>Diterbitkan: {{ \Carbon\Carbon::parse($cerpen->created_at)->format('d M Y') }}</span>
    </div>

    <div class="nft-description">
        <div class="cerpen-container">

            {!! nl2br(e($cerpen->keterangan)) !!}
        </div>
    </div>

    <div class="nft-actions">
        <a href="{{ route('cerpen.index') }}" class="btn-white cerpen-btn">Kembali</a>
    </div>
</div>
@endsection
