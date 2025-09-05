<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Traits\ApiResponse;

class TokenAuthMiddleware
{
    use ApiResponse;

    private $tokens = [
        '4b5f8f32c96a9aa152e0c6615d4e632f' => ['001','002','003','004','005','006'],
        '117ae721e424e7f819893edb2c0c5fd6' => ['002','003','004'],
        '3b7d6e2cb06ba79a9c9744f8e256a39e' => ['005','006'],
    ];

    public function handle(Request $request, Closure $next, ...$requiredPermissions)
    {
        $authHeader = $request->header('Authorization');

        if (!$authHeader || !str_starts_with($authHeader, 'Bearer ')) {
            return $this->errorResponse('Token not provided', 401);
        }

        $token = substr($authHeader, 7);

        if (!isset($this->tokens[$token])) {
            return $this->errorResponse('Token invalid', 401);
        }

        if ($requiredPermissions) {
            $hasPermission = collect($requiredPermissions)->every(fn($perm) => in_array($perm, $this->tokens[$token]));
            if (!$hasPermission) {
                return $this->errorResponse('Permission denied', 403);
            }
        }

        return $next($request);
    }
}
