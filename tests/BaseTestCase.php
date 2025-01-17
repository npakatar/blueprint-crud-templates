<?php


namespace Npakatar\BlueprintCrudTemplates\Tests;


use Npakatar\BlueprintCrudTemplates\BlueprintCrudTemplatesServiceProvider;
use Orchestra\Testbench\TestCase;

class BaseTestCase extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [BlueprintCrudTemplatesServiceProvider::class];
    }


    public function fixture(string $path)
    {
        return file_get_contents(__DIR__ . '/' . 'Fixtures' . '/' . ltrim($path, '/'));
    }

    public function stub(string $path)
    {
        return file_get_contents($path);
    }
}
