<?php

namespace RomkaLTU\LivewireGooglePlacesAutocomplete;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use RomkaLTU\LivewireGooglePlacesAutocomplete\Commands\LivewireGooglePlacesAutocompleteCommand;

class LivewireGooglePlacesAutocompleteServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('livewire-google-places-autocomplete')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_livewire-google-places-autocomplete_table')
            ->hasCommand(LivewireGooglePlacesAutocompleteCommand::class);
    }
}
