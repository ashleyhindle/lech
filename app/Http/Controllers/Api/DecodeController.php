<?php

namespace App\Http\Controllers\Api;

use App\Models\Url;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DecodeController
{
    public function __invoke(Request $request): JsonResponse
    {
        $nanoid = trim(parse_url($request->input('url'), PHP_URL_PATH), '/');
        $url = Url::findOrFail($nanoid);

        return response()->json(['original_url' => $url->url]);
    }
}
