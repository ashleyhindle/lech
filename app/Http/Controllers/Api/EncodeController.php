<?php

namespace App\Http\Controllers\Api;

use App\Actions\Encode;
use App\Exceptions\GenerationFailedException;
use App\Exceptions\InvalidUrlException;
use App\Http\Requests\EncodeRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class EncodeController
{
    public function __invoke(EncodeRequest $request): JsonResponse
    {
        // URL has been validated at this point through the EncodeRequest class
        $url = $request->validated('url');

        try {
            $encodedUrl = (new Encode)($url);
        } catch (GenerationFailedException $e) {
            return response()->json(['error' => 'Failed to generate unique short URL'], Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (InvalidUrlException $e) {
            return response()->json(['error' => 'Invalid URL'], Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went terribly wrong'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json(['short_url' => $encodedUrl], Response::HTTP_CREATED);
    }
}
