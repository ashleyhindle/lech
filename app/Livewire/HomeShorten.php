<?php

namespace App\Livewire;

use App\Actions\Encode;
use Livewire\Attributes\Rule;
use Livewire\Component;

class HomeShorten extends Component
{
    #[Rule(['url' => 'required|url'], as: 'URL')]
    public ?string $url = null;

    public ?string $shortUrl = null;

    public bool $smaller = true;

    public function submit()
    {
        $this->validate();
        $this->shortUrl = (new Encode)($this->url);
        if (strlen($this->shortUrl) > strlen($this->url)) {
            $this->smaller = false;
        }

        $this->url = null;
    }

    public function updatedUrl()
    {
        $this->shortUrl = null;
        $this->smaller = true;
    }
}
