<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\DecodeRequest;
use App\Models\Url;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class DecodeController
{
    public function __invoke(DecodeRequest $request): JsonResponse
    {
        $nanoid = parse_url($request->validated('url'), PHP_URL_PATH);
        if (empty($nanoid)) {
            return response()->json(['error' => 'Invalid URL'], Response::HTTP_BAD_REQUEST);
        }

        $nanoid = trim($nanoid, '/');
        $url = Url::findOrFail($nanoid);

        return response()->json(['original_url' => $url->url]);
    }
}
