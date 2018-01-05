<?php

namespace BC\LumenSwagger;

class SwaggerCommand extends \Illuminate\Console\Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'swagger {--p|path=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Swagger JSON file from your annotations';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $root = app()->basePath();

        $path = $this->option('path') ?? $root . '/swagger.json';

        $swagger = \Swagger\scan($root, [
            'exclude' => [
                'tests',
                'vendor',
            ],
        ]);

        file_put_contents($path, $swagger);

        $this->info('Generated at "' . realpath($path) . '"');
    }
}
