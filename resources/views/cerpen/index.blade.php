@extends('layouts.app')
@section('meta_description', 'World of Top Works – Temukan cerpen terbaik hasil karya siswa SMKN 11 Semarang. Cerpen
edukatif, kreatif, dan inovatif.')

@section('content')
@forelse ($cerpens as $cerpen)
<div class="container-info">
    <div class="nft-details">
        <h1>{{ $cerpen->judul }}</h1>
    </div>
    <div class="nft-description">
        <p> {{ Str::limit($cerpen['keterangan'], 150) }}</p>
        <a href="{{ route('cerpen.show',$cerpen) }}">Ke Post</a>
    </div>
</div>
@empty

@endforelse
@php
$currentpage = $cerpens->currentPage();
$lastPage = $cerpens->lastPage();
$nextPage = null;
$prevPage = null;

if($currentpage < $lastPage) { $nextPage=$currentpage + 1; } if ($currentpage> 1) {
    $prevPage = $currentpage - 1;
    }
    $query = request()->query();

    @endphp
    <div class="buttons-pagination" style="display: flex; gap: 1rem; justify-content:center;">
        @if ($prevPage)
        <a href="{{ route('cerpen.index', array_merge($query, ['page' => $prevPage])) }}" class="btn-white">⬅
            Previous</a>
        @endif

        @if ($nextPage)
        <a href="{{ route('cerpen.index', array_merge($query, ['page' => $nextPage])) }}" class="btn-yellow">Next
            ➡</a>
        @endif
    </div>
    <p style="text-align: center; margin-top: 1rem;">
        Page {{ $cerpens->currentPage() }} of {{ $cerpens->lastPage() }}
    </p>
    @endsection
