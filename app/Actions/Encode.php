<?php

namespace App\Actions;

use App\Models\Url;
use Hidehalo\Nanoid\Client as NanoidClient;

class Encode
{
    public function __invoke(string $url): string
    {
        // TODO: Validate URL and throw custom exception if not valid
        // TODO: Add X attempts to generate unique short URL
        $url = Url::create([
            'url' => $url,
            'nanoid' => (new NanoidClient)->generateId(7),
        ]);

        return config('app.url').'/'.$url->nanoid;
    }
}
