<?php

namespace Middlewares;

use Exception;
use Src\Request;
use Src\Session;

class CSRFMiddleware
{
    /**
     * @throws Exception
     */
    public function handle(Request $request): void
    {
        if ($request->method !== 'POST') {
            return;
        } elseif (empty($request->get('csrf_token')) || $request->get('csrf_token') !== Session::get('csrf_token')) {
            throw new Exception('Request not authorized');
        }
    }
}