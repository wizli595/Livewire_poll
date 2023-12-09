<div>
    @forelse ($polls as $poll)
        <div class=" mb-4 text-center  border rounded-md">
            <h3 class="mb-4 text-xl first-letter:capitalize">{{ $poll->title }}</h3>
            @foreach ($poll->options as $opt)
                <div class="mb-2">
                    <button class="btn" wire:click='vote({{ $opt->id }})'>vote</button>
                    {{ $opt->name }} : {{ $opt->votes->count() }}
                </div>
            @endforeach
        </div>

    @empty
        <div class=" text-gray-500 capitalize">no polls avilable</div>
    @endforelse
</div>
