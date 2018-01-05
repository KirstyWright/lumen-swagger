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
        $swagger = \Swagger\scan(...[
            $this->scanOption() ?? app()->basePath(),
            ['exclude' => ['tests', 'vendor']],
        ]);

        file_put_contents($this->pathOption(), $swagger);

        $this->info('Generated at "' . $this->pathOption() . '"');
    }

    protected function pathOption() : string
    {
        return $this->relativeOrAbsolute(
            $this->option('path') ?? app()->basePath() . '/swagger.json'
        );
    }

    protected function scanOption() : string
    {
        return $this->relativeOrAbsolute($this->option('scan'));
    }

    protected function relativeOrAbsolute(string $path)
    {
        return starts_with($path, '/') ? $path : realpath(__DIR__ . '/' . $path);
    }
}
