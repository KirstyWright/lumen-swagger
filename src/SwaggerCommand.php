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
        $swagger = \Swagger\scan($this->scanOption(), ['exclude' => ['tests', 'vendor']]);

        file_put_contents($path = $this->pathOption(), $swagger);

        $this->info('Generated at "' . $path . '"');
    }

    protected function pathOption() : string
    {
        return $this->relativeOrAbsolute(
            $this->option('path') ?? app()->basePath() . '/swagger.json'
        );
    }

    protected function scanOption() : string
    {
        return $this->relativeOrAbsolute($this->scanOption() ?? app()->basePath());
    }

    protected function relativeOrAbsolute(string $path) : ?string
    {
        return starts_with($path, '/') ? $path : realpath(__DIR__ . '/' . $path);
    }
}
