<?php


namespace Npakatar\BlueprintCrudTemplates\Tests\Unit;


use Blueprint\Blueprint;
use Npakatar\BlueprintCrudTemplates\Generators\TemplateGenerator;
use Npakatar\BlueprintCrudTemplates\Tests\BaseTestCase;
use Blueprint\Tree;

class TemplateGeneratorTest extends BaseTestCase
{
    private $blueprint;
    private $files;
    private $generator;
    private $indexStub;

    protected function setUp(): void
    {
        parent::setUp();

        $this->blueprint = resolve(Blueprint::class);

        $this->files = \Mockery::mock();
        $this->generator = new TemplateGenerator($this->files);
        $this->indexStub = 'template.index.stub';
    }

    /** @test */
    public function output_generates_nothing_for_empty_tree()
    {
        $this->assertEquals([], $this->generator->output(new Tree(['templates' => []])));
    }


    /** @test */
    public function output_generates_an_index_vue_template()
    {
        $path = 'resources/js/Pages/Post/Index.vue';

        $this->files->expects('stub')
            ->with($this->indexStub)
            ->andReturn($this->stub($this->indexStub));

        $this->files->expects('put')
            ->with($path, $this->fixture('outputs/Post/Index.vue'));

        $tokens = $this->blueprint->parse($this->fixture('drafts/draft.yaml'));
        $tree = $this->blueprint->analyze($tokens);

        $this->assertEquals(['created' => [$path]], $this->generator->output($tree));
    }
}
