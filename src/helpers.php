<?php

if (!function_exists('nmeta')) {
    /**
     * nmeta
     *
     * @return \NMeta\NMeta
     * @throws \NMeta\BadRequestException
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    function nmeta(): \NMeta\NMeta
    {
        try {
            return app(\NMeta\NMeta::class);
        } catch (Illuminate\Contracts\Container\BindingResolutionException $e) {
            throw new \NMeta\BadRequestException('NMeta is not attached, is the middleware added?');
        }
    }
}