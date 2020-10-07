<?php


namespace Npakatar\BlueprintCrudTemplates\Tests\Feature;

use Blueprint\Blueprint;
use Npakatar\BlueprintCrudTemplates\Tests\BaseTestCase;

class EndToEndTest extends BaseTestCase
{
    /** @test */
    public function it_registers_template_lexer_and_analyzes_templates()
    {
        $template = $this->fixture('draft.yaml');

        $blueprint = app(Blueprint::class);

        $parsed = app(Blueprint::class)->parse($template);
        $actual = $blueprint->analyze($parsed)->toArray();

        $this->assertCount(1, $actual['templates']);
        $this->assertCount(4, $actual['templates']['Post']);

        $this->assertEquals([
            'index' => 'title, content',
            'create' => 'title, content',
            'edit' => 'title, content',
            'show' => 'title, content',
        ], $actual['templates']['Post']);
    }
}
