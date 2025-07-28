@extends('layouts.app')
@section('meta_description', 'World of Top Works – Temukan cerpen terbaik hasil karya siswa SMKN 11 Semarang. Cerpen
edukatif, kreatif, dan inovatif.')

@section('content')
<!-- Search Form -->
<div class="hero-search">
    <form action="{{ route('cerpen.index') }}" method="GET" class="search-form">
        <i data-feather="search" class="search-icon"></i>
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search" id="searchInput"
            autocomplete="off">
        <!-- Tombol reset pencarian -->
        <button type="button" id="resetButton" class="reset-button" title="Reset search" style="display: none;">
            <i data-feather="x"></i>
        </button>

    </form>
</div>
@forelse ($cerpens as $cerpen)
<div class="container-info">
    <div class="nft-details">
        <h1>{{ $cerpen->judul }}</h1>
    </div>
    <div class="nft-description">
        <small>{{ $cerpen->user->name }}</small>
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
    <script>
    document.addEventListener('DOMContentLoaded', () => {

        const searchInput = document.getElementById('searchInput');
        const resetButton = document.getElementById('resetButton');
        const kategoriSelect = document.getElementById('kategori');
        const form = document.getElementById('filterForm');



        // Tampilkan tombol reset saat input difokuskan dan ada isinya
        function toggleResetButton() {
            if (searchInput === document.activeElement || searchInput.value.trim() !== '') {
                resetButton.style.display = 'flex';
            } else {
                resetButton.style.display = 'none';
            }
        }

        searchInput.addEventListener('focus', toggleResetButton);
        searchInput.addEventListener('input', toggleResetButton);
        searchInput.addEventListener('blur', () => {
            setTimeout(() => {
                if (searchInput.value.trim() === '') {
                    resetButton.style.display = 'none';
                }
            }, 100);
        });

        resetButton.addEventListener('click', () => {
            searchInput.value = '';
            form.submit(); // kirim form ulang tanpa input pencarian
        });

        // Auto-submit saat kategori dipilih
        kategoriSelect?.addEventListener('change', () => {
            form.submit();
        });
    });
    </script>
