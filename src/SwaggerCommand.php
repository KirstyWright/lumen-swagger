<?php

namespace BC\LumenSwagger;

class SwaggerCommand extends \Illuminate\Console\Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'swagger {--p|path=} {--s|scan=}';

    /**
     * The console command description.
     */
    protected $description = 'Generate Swagger JSON file from your annotations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $args = $this->option('scan')
            ? [$this->option('scan')]
            : [app()->basePath(), ['exclude' => ['tests', 'vendor']]];

        $swagger = \Swagger\scan(...$args);

        file_put_contents($this->getPath(), $swagger);

        $this->info('Generated at "' . $this->getPath() . '"');
    }

    protected function getPath() : string
    {
        return $this->option('path') ?? app()->basePath() . '/swagger.json';
    }
}
