<?php

namespace RomkaLTU\LivewireGooglePlacesAutocomplete\Http\Livewire;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class LivewireGooglePlacesAutocomplete extends Component
{
    public string $search = '';

    public array $predictions = [];

    public $selectedPlace = null;

    public string $elementId = 'lgpa-place';

    public string $class = '';

    public string $label = '';

    public string $labelClass = '';

    public string $inputClass = '';

    public function render()
    {
        return view('livewire-google-places-autocomplete::field');
    }

    public function updatedSearch(string $value): void
    {
        $response = Http::get('https://maps.googleapis.com/maps/api/place/autocomplete/json', [
          'input' => $value,
          'key' => config('livewire-google-places-autocomplete.google_api_key'),
          'language' => config('livewire-google-places-autocomplete.language'),
        ]);

        if ($response->failed()) {
            return;
        }

        $this->predictions = $response->json('predictions');
    }

    public function focusNext($currentIndex): void
    {
        $this->emit('focusNext', $currentIndex + 1);
    }

    public function focusPrev($currentIndex): void
    {
        $this->emit('focusPrev', $currentIndex - 1);
    }

    public function selectPlace(string $placeId): void
    {
        $response = Http::get('https://maps.googleapis.com/maps/api/place/details/json', [
          'place_id' => $placeId,
          'key' => config('livewire-google-places-autocomplete.google_api_key'),
          'language' => config('livewire-google-places-autocomplete.language'),
        ]);

        if ($response->failed()) {
            return;
        }

        $formattedAddress = Arr::get($response->json('result'), 'formatted_address');

        $this->predictions = [];
        $this->selectedPlace = $response->json('result');
        $this->search = $formattedAddress;
        $this->emit('placeSelected', $response->json('result'));
    }

    public function clear(): void
    {
        $this->search = '';
        $this->predictions = [];
        $this->selectedPlace = null;
        $this->emit('placeCleared');
    }
}
