<?php

namespace Npakatar\BlueprintCrudTemplates\Tests;

use Orchestra\Testbench\TestCase;
use Npakatar\BlueprintCrudTemplates\BlueprintCrudTemplatesServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [BlueprintCrudTemplatesServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
