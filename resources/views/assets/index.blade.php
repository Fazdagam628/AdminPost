@extends('layouts.app')
@section('meta_description', 'Eksplor lebih jauh tentang koleksi assets dari siswa PPLG')
@section('content')

<!-- Filter & Item List -->
<section class="filter-section">
    <form action="{{ route('assets.index') }}" method="GET" id="filterForm">
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
        <h2>Explore Assets</h2>
        <div class=" filters">
            <select name="category" id="category">
                <option value="">Category</option>
                <option value="">All Categories</option>
                @foreach ($allCategories as $category)
                <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                    {{ $category }}
                </option>
                @endforeach
            </select>
    </form>
    </div>
    <div class="item-grid">
        @forelse ($assets as $asset)

        <div class="item-card">
            <a style="text-decoration:none; color:white;" href="{{ route('assets.show', $asset) }}">
                <img src="{{ asset('/storage/'.$asset->image_cover) }}" alt="{{ $asset->name }}">
                <p><strong>{{ $asset->name }}</strong></p>
                <small>Posted by: {{ $asset->author }}</small>
            </a>
        </div>
        @empty
        <div class="item-card">
            <p><strong>Game not found</strong></p>
        </div>

        @endforelse
    </div>
    @php
    $currentPage = $assets->currentPage();
    $lastPage = $assets->lastPage();
    $nextPage = null;
    $prevPage = null;

    $nextPage = null;
    $prevPage = null;

    if ($currentPage < $lastPage) { $nextPage=$currentPage + 1; } if ($currentPage> 1) {
        $prevPage = $currentPage - 1;
        }
        $query = request()->query();
        @endphp

        <div class="buttons-pagination" style="display: flex; gap: 1rem; justify-content:center;">
            @if ($prevPage)
            <a href="{{ route('assets.index', array_merge($query, ['page' => $prevPage])) }}" class="btn-white">⬅
                Previous</a>
            @endif

            @if ($nextPage)
            <a href="{{ route('assets.index', array_merge($query, ['page' => $nextPage])) }}" class="btn-yellow">Next
                ➡</a>
            @endif
        </div>

</section>
<p style="text-align: center; margin-top: 1rem;">
    Page {{ $assets->currentPage() }} of {{ $assets->lastPage() }}
</p>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        const searchInput = document.getElementById('searchInput');
        const resetButton = document.getElementById('resetButton');
        const kategoriSelect = document.getElementById('category');
        const form = document.getElementById('filterForm');


        const cards = document.querySelectorAll('.item-card');

        cards.forEach((card, index) => {
            // Fade-in stagger otomatis
            card.style.animation = `fadeInUp 0.6s ease forwards`;
            card.style.animationDelay = `${index * 0.15}s`;

            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;

                const rotateX = ((y - centerY) / centerY) * 5;
                const rotateY = ((x - centerX) / centerX) * -5;

                // Arah bayangan mengikuti rotasi
                const shadowX = (x - centerX) / 8;
                const shadowY = (y - centerY) / 8;

                // Highlight dinamis
                const lightX = (x / rect.width) * 100;
                const lightY = (y / rect.height) * 100;

                card.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.03)`;
                card.style.boxShadow = `${-shadowX}px ${shadowY}px 25px rgba(0, 0, 0, 0.5)`;
                card.style.background = `radial-gradient(circle at ${lightX}% ${lightY}%, rgba(255,255,255,0.05), #1a1a1a)`;
            });

            // Reset saat mouse keluar
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'rotateX(0) rotateY(0) scale(1)';
                card.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.4)';
                card.style.background = 'linear-gradient(145deg, #1a1a1a, #161616)';
            });
        });
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

        // Auto-submit saat category dipilih
        kategoriSelect?.addEventListener('change', () => {
            form.submit();
        });
    });
</script>

@endsection
