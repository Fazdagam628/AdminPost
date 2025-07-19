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
            <a style="text-decoration:none; color:white;" href="{{ route('games.show', $game->id) }}">
                <img src="{{ asset('/storage/'.$game->image) }}" alt="Art 5">
                <p><strong>{{ $game->name }}</strong></p>
                <small>Posted by: {{ $game->creator }}</small>
            </a>
        </div>
        @empty

        @endforelse
    </div>

</section>

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
