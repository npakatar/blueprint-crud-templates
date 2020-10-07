<?php


namespace Npakatar\BlueprintCrudTemplates\Tests\Unit;


use Npakatar\BlueprintCrudTemplates\Generators\TemplateGenerator;
use Npakatar\BlueprintCrudTemplates\Tests\BaseTestCase;
use Blueprint\Tree;

class TemplateGeneratorTest extends BaseTestCase
{
    private $files;
    private $generator;
    private $indexStub;

    protected function setUp(): void
    {
        parent::setUp();

        $this->files = \Mockery::mock();
        $this->generator = new TemplateGenerator($this->files);
        $this->indexStub = 'template.index.stub';

    }

    /** @test */
    public function output_generates_nothing_for_empty_tree()
    {
        $this->files->expects('stub')
            ->with($this->indexStub)
            ->andReturn($this->stub($this->indexStub));

        $this->files->shouldNotHaveReceived('put');

        $this->assertEquals([], $this->generator->output(new Tree(['templates' => []])));
    }

}
