<?php

namespace RomkaLTU\LivewireGooglePlacesAutocomplete\Commands;

use Illuminate\Console\Command;

class LivewireGooglePlacesAutocompleteCommand extends Command
{
    public $signature = 'livewire-google-places-autocomplete';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
