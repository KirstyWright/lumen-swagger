<?php

namespace BC\LumenSwagger;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register package's services.
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands(SwaggerCommand::class);
        }
    }
}
