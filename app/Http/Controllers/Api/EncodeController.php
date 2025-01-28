<?php

namespace App\Http\Controllers\Api;

use App\Actions\Encode;
use App\Http\Requests\EncodeRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class EncodeController
{
    public function __invoke(EncodeRequest $request): JsonResponse
    {
        // URL has been validated at this point through the EncodeRequest class
        $url = $request->input('url');
        try {
            $encodedUrl = (new Encode)($url);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid URL'], Response::HTTP_BAD_REQUEST); // TODO: use a dedicate exception for 'invalid url' or just 'db issue' so we can handle it differently
        }

        return response()->json(['short_url' => $encodedUrl], Response::HTTP_CREATED);
    }
}
