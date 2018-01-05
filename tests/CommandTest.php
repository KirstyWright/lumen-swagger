<?php

class CommandTest extends TestCase
{
    /** @test */
    public function it_generates_a_swagger_file()
    {
        $path = __DIR__ . '/../documentation.json';

        Artisan::call('swagger', [
            '--path' => $path,
            '--scan' => __DIR__,
        ]);

        $this->assertTrue(is_file($path));
    }
}
