<?php


namespace Npakatar\BlueprintCrudTemplates\Generators;


use Blueprint\Contracts\Generator;
use Blueprint\Tree;

class TemplateGenerator implements Generator
{
    private $files;
    private $tree;

    public function __construct($files)
    {
        $this->files = $files;
    }

    public function output(Tree $tree): array
    {
        $this->tree = $tree;

        $stub = $this->files->stub('template.index.stub');

        foreach ($this->tree->toArray()['templates'] as $model) {



        }

        return [];
    }

    public function types(): array
    {
        return [
            'templates'
        ];
    }

    protected function populateIndexStub($stub, $fields)
    {

    }
}
