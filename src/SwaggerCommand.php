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
        if ($scan = $this->option('scan')) {
            $swagger = \Swagger\scan($scan);
        } else {
            $swagger = \Swagger\scan(app()->basePath(), [
                'exclude' => [
                    'tests',
                    'vendor',
                ],
            ]);
        }

        file_put_contents($this->getPath(), $swagger);

        $this->info('Generated at "' . realpath($path) . '"');
    }

    protected function getPath() : string
    {
        return $this->option('path') ?? app()->basePath() . '/swagger.json';
    }
}
