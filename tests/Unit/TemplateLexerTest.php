<?php

namespace Npakatar\BlueprintCrudTemplates\Tests\Unit;

use Npakatar\BlueprintCrudTemplates\Lexers\TemplateLexer;
use Npakatar\BlueprintCrudTemplates\Tests\BaseTestCase;

class TemplateLexerTest extends BaseTestCase
{
    private $lexer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->lexer = app(TemplateLexer::class);
    }

    /** @test */
    public function it_returns_nothing_without_templates_listed()
    {
        $tokens = [
            'templates' => []
        ];

        $this->assertEquals($tokens, $this->lexer->analyze([]));
    }

    /** @test */
    public function it_analyzes_templates()
    {
        $tokens = [
            'templates' => [
                'Post' => [
                    'index' => 'title, content',
                    'create' => 'title, content',
                    'edit' => 'title, content',
                    'show' => 'title, content',
                ]
            ],
        ];

        $actual = $this->lexer->analyze($tokens);


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
