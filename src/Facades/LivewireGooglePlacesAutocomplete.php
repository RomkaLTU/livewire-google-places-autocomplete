<?php

namespace RomkaLTU\LivewireGooglePlacesAutocomplete\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RomkaLTU\LivewireGooglePlacesAutocomplete\LivewireGooglePlacesAutocomplete
 */
class LivewireGooglePlacesAutocomplete extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \RomkaLTU\LivewireGooglePlacesAutocomplete\LivewireGooglePlacesAutocomplete::class;
    }
}
