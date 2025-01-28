<?php

namespace App\Livewire;

use App\Actions\Encode;
use Livewire\Attributes\Rule;
use Livewire\Component;

class HomeShorten extends Component
{
    #[Rule(['url' => 'required|url'], as: 'URL')]
    public string $url = '';

    public string $shortUrl = '';

    public bool $smaller = true;

    public function submit(): void
    {
        $this->validate();
        $this->shortUrl = (new Encode)($this->url);
        if (strlen($this->shortUrl) > strlen($this->url)) {
            $this->smaller = false;
        }

        $this->url = '';
    }

    public function updatedUrl(): void
    {
        $this->shortUrl = '';
        $this->smaller = true;
    }
}
