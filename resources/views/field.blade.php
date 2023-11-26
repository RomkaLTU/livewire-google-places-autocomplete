<div class="flex flex-col">
    <div class="{{ $class }}">
        <label for="{{ $elementId }}" class="lvgpa-label {{ $labelClass }}">
            {!! $label !!}
        </label>
        <div class="rd-w-full rd-relative">
          <input
            id="{{ $elementId }}"
            class="lvgpa-input {{ $inputClass }}"
            type="text"
            wire:model.debounce.300ms="search"
            wire:keydown.escape="clear"
            wire:keydown.arrow-down="focusNext(-1)"
            name="place"
            value="{{ $value }}"
            autocomplete="off"
            aria-controls="autocomplete-results" />
          @if($predictions)
            <div id="lgpa-autocomplete-results" class="lvgpa-results rd-absolute rd-left-0 rd-w-full rd-bg-white rd-border rd-border-solid rd-border-[#2d3748] rd-border-t-none rd-divide-y rd-divide-solid rd-divide-gray-400 rd-gap-y-2" role="listbox">
              @forelse($predictions as $index => $prediction)
                <div
                  role="option"
                  tabindex="{{ $index }}"
                  class="lvgpa-results-item rd-p-2 rd-cursor-pointer hover:rd-bg-gray-200 rd-p-2 focus:rd-bg-gray-200"
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
    <script src="{{ asset('vendor/livewire-google-places-autocomplete/app.js') }}" defer></script>
</div>
