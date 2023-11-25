<div class="flex flex-col">
    <div class="{{ $class }}">
        <label for="{{ $elementId }}" class="lvgpa-label {{ $labelClass }}">
            {!! $label !!}
        </label>
        <div class="w-full relative">
          <input
            id="{{ $elementId }}"
            class="lvgpa-input {{ $inputClass }}"
            type="text"
            wire:model.debounce.700ms="search"
            wire:keydown.escape="clear"
            wire:keydown.arrow-down="focusNext(-1)"
            name="place"
            autocomplete="off"
            aria-controls="autocomplete-results" />
          @if($predictions)
            <div id="lgpa-autocomplete-results" class="lvgpa-results absolute left-0 w-full bg-white border border-t-none border-gray-500 lvgpa-results divide-y divide-solid divide-gray-400 gap-y-2" role="listbox">
              @forelse($predictions as $index => $prediction)
                <div
                  role="option"
                  tabindex="{{ $index }}"
                  class="lvgpa-results-item p-2 cursor-pointer hover:bg-gray-200 p-2 focus:bg-gray-200"
                  wire:key="{{ $prediction['place_id'] }}"
                  wire:keydown.escape="clear"
                  wire:keydown.arrow-down="focusNext({{ $index }})"
                  wire:keydown.arrow-up="focusPrev({{ $index }})"
                  wire:keydown.enter="selectPlace('{{ $prediction['place_id'] }}')"
                  wire:click="selectPlace('{{ $prediction['place_id'] }}')">
                  {{ $prediction['structured_formatting']['main_text'] }}
                </div>
              @empty
              @endforelse
            </div>
          @endif
        </div>
    </div>

    <link href="{{ asset('vendor/livewire-google-places-autocomplete/main.css') }}" rel="stylesheet">
    <script src="{{ asset('vendor/livewire-google-places-autocomplete/app.js?v=1.01') }}" defer></script>
</div>
