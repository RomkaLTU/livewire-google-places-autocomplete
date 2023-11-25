<?php

namespace RomkaLTU\LivewireGooglePlacesAutocomplete;

use Livewire\Livewire;
use RomkaLTU\LivewireGooglePlacesAutocomplete\Http\Livewire\LivewireGooglePlacesAutocomplete;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LivewireGooglePlacesAutocompleteServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('livewire-google-places-autocomplete')
            ->hasConfigFile()
            ->hasAssets()
            ->hasViews();
    }

    public function packageRegistered(): void
    {
        Livewire::component('livewire-google-places-autocomplete', LivewireGooglePlacesAutocomplete::class);
    }
}
