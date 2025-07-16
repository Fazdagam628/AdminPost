<div>
    <div class="filters">
        <select wire:model="selectedCategory">
            <option value="">-- All Categories --</option>
            @foreach ($categories as $cat)
            <option value="{{ $cat }}">{{ ucfirst($cat) }}</option>
            @endforeach
        </select>
    </div>

    <div class="item-grid">
        @forelse ($games as $game)
        <div class="item-card">
            <a style="text-decoration: none; color: white;" href="{{ route('games.show', $game->id) }}">
                <img src="{{ asset('/storage/' . $game->image) }}" alt="game image">
                <p><strong>{{ $game->name }}</strong></p>
                <small>Posted by: {{ $game->creator }}</small>
            </a>
        </div>

        @empty
        <p>No games found in this category.</p>
        @endforelse
        <div>
            <p>Selected Category: {{ $selectedCategory }}</p>
        </div>
    </div>
</div>
