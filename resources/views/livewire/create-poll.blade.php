<div>
    <form wire:submit.prevent='save'>
        <label for="title">Pool title</label>
        <input type="text" wire:model.live="title" />

        @error('title')
            <div class="error">
                {{ $message }}
            </div>
        @enderror

        <div class="mb-4 mt-2">
            <button class="btn" wire:click.prevent='addOption'>add Option</button>
        </div>

        <div class="mb-2">
            @forelse ($options as $index=>$value)
                <div class="mb-4">
                    <label for="option">Option {{ $index + 1 }}</label>
                    <div class="flex gap-2">
                        <input type="text" name="option" wire:model.live='options.{{ $index }}'>
                        <button class="btn" wire:click.prevent='removeOption({{ $index }})'>remove</button>
                    </div>
                    @error("options.$index")
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            @empty
                <div class=" text-gray-500 capitalize mb-3">no Options</div>
            @endforelse
        </div>

        <button type="submit" class="btn">create Poll</button>
    </form>
</div>
