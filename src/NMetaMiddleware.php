<?php

namespace NMeta;

use Closure;
use Illuminate\Http\Request;

/**
 * Class NMetaMiddleware
 *
 * @package NMeta
 * @author  Casper Rasmussen <cr@nodes.dk>
 */
class NMetaMiddleware
{
    /**
     * handle
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param null                     $guard
     * @return mixed
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        app()->singleton(NMeta::class, function () use ($request) {
            $config = new Config(config('n-meta'));
            return new NMeta($request->header($config->getHeader()), $config);
        });

        return $next($request);
    }
}