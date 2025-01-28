<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\DecodeRequest;
use App\Models\Url;
use Illuminate\Http\JsonResponse;

class DecodeController
{
    public function __invoke(DecodeRequest $request): JsonResponse
    {
        $nanoid = trim(parse_url($request->validated('url'), PHP_URL_PATH), '/');
        $url = Url::findOrFail($nanoid);

        return response()->json(['original_url' => $url->url]);
    }
}
