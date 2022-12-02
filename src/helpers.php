<?php

use NMeta\BadRequestException;
use NMeta\NMeta;

if (!function_exists('nmeta')) {
    /**
     * nmeta
     *
     * @return NMeta
     * @throws BadRequestException
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    function nmeta(): NMeta
    {
        try {
            return app(NMeta::class);
        } catch (Illuminate\Contracts\Container\BindingResolutionException $e) {
            throw new BadRequestException('NMeta is not attached, is the middleware added?');
        }
    }
}