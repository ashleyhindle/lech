<?php

namespace App\Http\Middleware;

use App\Models\ApiToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureApiTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiToken = $request->header('X-Api-Token');
        if (! $apiToken) {
            return response()->json(['message' => 'API token missing'], 401);
        }

        $dbToken = ApiToken::where('token', hash('sha256', $apiToken))->first();
        if (! $dbToken) {
            return response()->json(['message' => 'API token invalid'], 401);
        }

        if ($dbToken->expires_at < now()) {
            return response()->json(['message' => 'API token expired'], 401);
        }

        $dbToken->update(['last_used_at' => now()]);

        return $next($request);
    }
}
