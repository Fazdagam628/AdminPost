@extends('layouts.app')
@section('meta_description', 'World of Top Works – Temukan cerpen terbaik hasil karya siswa SMKN 11 Semarang. Cerpen
edukatif, kreatif, dan inovatif.')

@section('content')
<!-- Search Form -->
<section class="filter-section">

    <form action="{{ route('cerpen.index') }}" method="GET" id="filterForm">
        <div class="hero-search game">
            <div class="search-form">
                <i data-feather="search" class="search-icon"></i>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search" id="searchInput"
                    autocomplete="off">
                <!-- Tombol reset pencarian -->
                <button type="button" id="resetButton" class="reset-button" title="Reset search" style="display: none;">
                    <i data-feather="x"></i>
                </button>
            </div>
        </div>
        <h2>Explore Cerpen</h2>
        <div class="sort">
            <select name="sort" id="sort">
               <option value="">Sort By</option>
                <option value="newest" {{ $sort == 'newest'? 'selected':'' }}>Newest</option>
                <option value="oldest" {{ $sort == 'oldest'? 'selected':'' }}>Oldest</option>
                <option value="az" {{ $sort == 'az'? 'selected':'' }}>Ascending</option>
                <option value="za" {{ $sort == 'za'? 'selected':'' }}>Descending</option>
                <option value="most_viewed" {{ $sort == 'most_viewed'? 'selected':'' }}>Most Viewed</option>
                <option value="least_viewed" {{ $sort == 'least_viewed'? 'selected':'' }}>Least Viewed</option>

            </select>
        </div>
    </form>
    @forelse ($cerpens as $cerpen)
    <div class="container-info" style="margin-top:1rem;">
        <div class="nft-details">
            <h1> <a class="cerpen-title" href="{{ route('cerpen.show',$cerpen) }}">{{ $cerpen->judul }}</a></h1>
        </div>
        <div class="nft-description">
            <small>Posted By : {{ $cerpen->user->name }}</small><br>
            <small>Writed By : {{ $cerpen->writer}}</small>
            <p style="color: #fff;"> {{ Str::limit($cerpen['keterangan'], 150) }}</p>
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
</section>
<script>
    document.addEventListener('DOMContentLoaded', () => {

        const searchInput = document.getElementById('searchInput');
        const resetButton = document.getElementById('resetButton');
        const sortSelect = document.getElementById('sort');
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

        sortSelect?.addEventListener('change', () => {
            form.submit();
        });
    });
</script>
