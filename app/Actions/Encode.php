<?php

namespace App\Actions;

use App\Exceptions\GenerationFailedException;
use App\Exceptions\InvalidUrlException;
use App\Models\Url;
use Hidehalo\Nanoid\Client as NanoidClient;

class Encode
{
    public function __invoke(string $url): string
    {
        $isValid = filter_var($url, FILTER_VALIDATE_URL);
        if (! $isValid) {
            throw new InvalidUrlException('Invalid URL');
        }

        $url = $this->insertUrl($url);

        return route('redirect', ['url' => $url]);
    }

    private function insertUrl(string $url): Url
    {
        $attempts = 0;
        $maxAttempts = 3;

        while ($attempts < $maxAttempts) {
            try {
                $url = Url::create([
                    'url' => $url,
                    'nanoid' => (new NanoidClient)->generateId(7),
                ]);
            } catch (\Exception $e) {
                $attempts++;

                continue;
            }

            break;
        }

        if (! $url) {
            throw new GenerationFailedException('Failed to generate unique short URL');
        }

        return $url;
    }
}
