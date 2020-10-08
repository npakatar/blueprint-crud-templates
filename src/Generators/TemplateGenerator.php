<?php


namespace Npakatar\BlueprintCrudTemplates\Generators;


use Blueprint\Contracts\Generator;
use Blueprint\Tree;
use Illuminate\Support\Str;

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
        $output = [];
        $this->tree = $tree;

        foreach ($this->tree->toArray()['templates'] as $model => $resources) {
            $stub = $this->files->stub('template.index.stub');
            $path = $this->getPath($model, 'index');

            $this->files->put($path, $this->populateIndexStub($stub, $model, $resources['index']));

            $output['created'][] = $path;
            //foreach ($resources as $resource => $fields) {
            //    $stub = $this->files->stub('template.' . $resource . '.stub');
            //
            //}

        }

        return $output;
    }

    public function types(): array
    {
        return [
            'templates'
        ];
    }

    protected function getPath($model, $resource)
    {
        return sprintf('resources/js/Pages/%s/%s.vue', $model, ucfirst($resource));
    }

    protected function populateIndexStub($stub, $model, $fields)
    {
        $stub = str_replace('{{ dummyModel }}', Str::plural(lcfirst('Post')), $stub);
        $stub = str_replace('{{ fields }}', $this->splitFields($fields), $stub);

        return $stub;
    }

    protected function splitFields($fields)
    {
        return "['title', 'content']";
    }
}
