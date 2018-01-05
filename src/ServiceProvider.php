<?php

namespace BC\LumenSwagger;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register package's services.
     */
    public function register()
    {
        $this->commands(SwaggerCommand::class);
    }
}
