<?php

namespace NMeta;

use Illuminate\Support\Str;

/**
 * Class ServiceProvider.
 */
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * boot
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function boot()
    {
        if (!Str::contains($this->app->version(), 'Lumen')) {
            $this->publishGroups();
        }
    }

    /**
     * register
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function register()
    {
        parent::register();
    }

    /**
     * publishGroups
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    protected function publishGroups()
    {
        $this->publishes([
            __DIR__ . '/../config' => config_path(),
        ], 'config');
    }
}
