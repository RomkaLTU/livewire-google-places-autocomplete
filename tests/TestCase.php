<?php

namespace RomkaLTU\LivewireGooglePlacesAutocomplete\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use RomkaLTU\LivewireGooglePlacesAutocomplete\LivewireGooglePlacesAutocompleteServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'RomkaLTU\\LivewireGooglePlacesAutocomplete\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app): array
    {
        return [
          LivewireServiceProvider::class,
          LivewireGooglePlacesAutocompleteServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');
    }
}
