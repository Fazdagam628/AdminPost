@extends('layouts.app')

@section('content')

<!-- Filter & Item List -->
<section class="filter-section">
    <h2>Explore Games</h2>
    <div class="filters">
        <form id="filterForm" method="GET" action="{{ route('games.game') }}">
            <select name="kategori" id="kategori">
                <option>Category</option>
                <option value="">All Categories</option>
                @foreach ($allCategories as $category)
                <option value="{{ $category }}" {{ request('kategori') == $category ? 'selected' : '' }}>
                    {{ $category }}
                </option>
                @endforeach
            </select>
        </form>
    </div>
    <div class="item-grid">
        @forelse ($games as $game)

        <div class="item-card">
            <a style="text-decoration:none; color:white;" href="{{ route('games.show', $game) }}">
                <img src="{{ asset('/storage/'.$game->image) }}" alt="Art 5">
                <p><strong>{{ $game->name }}</strong></p>
                <small>Posted by: {{ $game->creator }}</small>
            </a>
        </div>
        @empty
        <div class="item-card">
            <p><strong>Game not found</strong></p>
        </div>

        @endforelse
    </div>
    @php
    $currentPage = $games->currentPage();
    $lastPage = $games->lastPage();
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
            <a href="{{ route('games.game', array_merge($query, ['page' => $prevPage])) }}" class="btn-white">⬅
                Previous</a>
            @endif

            @if ($nextPage)
            <a href="{{ route('games.game', array_merge($query, ['page' => $nextPage])) }}" class="btn-yellow">Next
                ➡</a>
            @endif
        </div>

</section>
<p style="text-align: center; margin-top: 1rem;">
    Page {{ $games->currentPage() }} of {{ $games->lastPage() }}
</p>

<script>
    document.getElementById('kategori').addEventListener('change', function() {
        const selectedValue = this.value;
        if (selectedValue === '') {
            // Redirect tanpa query string
            window.location.href = "{{ route('games.game') }}";
        } else {
            // Submit form normal dengan query kategori
            document.getElementById('filterForm').submit();
        }
    });
</script>

@endsection