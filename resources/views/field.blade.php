<div class="flex flex-col">
    <div class="{{ $class }}">
        <label for="{{ $elementId }}" class="lvgpa-label {{ $labelClass }}">
            {!! $label !!}
        </label>
        <input
            id="{{ $elementId }}"
            class="lvgpa-input {{ $inputClass }}"
            type="text"
            wire:model.debounce.700ms="search"
            name="place"
            aria-controls="autocomplete-results" />
    </div>
    <div id="lgpa-autocomplete-results" class="lvgpa-results" role="listbox">
        @forelse($predictions as $index => $prediction)
            <div
                role="option"
                tabindex="{{ $index }}"
                wire:key="{{ $prediction['place_id'] }}"
                wire:keydown.arrow-down="focusNext({{ $index }})"
                wire:keydown.arrow-up="focusPrev({{ $index }})"
                wire:keydown.enter="selectPlace('{{ $prediction['place_id'] }}')"
                wire:click="selectPlace('{{ $prediction['place_id'] }}')">
                {{ $prediction['structured_formatting']['main_text'] }}
            </div>
        @empty
        @endforelse
    </div>

    <link href="{{ asset('vendor/livewire-google-places-autocomplete/main.css') }}" rel="stylesheet">
    <script src="{{ asset('vendor/livewire-google-places-autocomplete/app.js?v=1.01') }}" defer></script>
</div>
