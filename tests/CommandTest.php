<?php

class CommandTest extends TestCase
{
    /** @test */
    public function it_generates_a_swagger_file()
    {
        Artisan::call('swagger');

        $this->assertTrue(is_file(__DIR__ . '/../swagger.json'));
    }

    /** @test */
    public function it_generates_a_swagger_file_with_custom_path()
    {
        Artisan::call('swagger', [
            '--path custom.json',
        ]);

        $this->assertTrue(is_file(__DIR__ . '/../custom.json'));
    }

    /** @test */
    public function it_generates_a_swagger_file_with_custom_scan()
    {
        Artisan::call('swagger', [
            '--scan custom',
        ]);

        $this->assertTrue(is_file(__DIR__ . '/../swagger.json'));
    }
}
