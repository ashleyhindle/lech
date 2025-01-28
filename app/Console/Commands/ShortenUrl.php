<?php

namespace App\Console\Commands;

use App\Actions\Encode;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class ShortenUrl extends Command
{
    protected $signature = 'app:shorten {url : The URL to shorten}';

    protected $description = 'Shortens a long URL for you';

    public function handle(): void
    {
        $args = $this->validateArguments();
        $encodedUrl = (new Encode)($args['url']);
        $this->info($encodedUrl);
    }

    /**
     * @return array<string, mixed>
     */
    protected function validateArguments(): array
    {
        $validator = Validator::make($this->arguments(), [
            'url' => 'required|url',
        ]);

        if ($validator->fails()) {
            $this->error('Oh no, your URL is dodgy. Try again with a valid URL.');
            collect($validator->errors()->all())->each(fn ($error) => $this->warn($error));
            exit(1);
        }

        return $validator->validated();
    }
}
