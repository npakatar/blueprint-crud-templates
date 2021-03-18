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
            // TODO stub out other CRUD screens, make dynamic
            $stub = $this->files->get(dirname(__DIR__, 2).'/stubs/template.index.stub');
            $path = $this->getPath($model, 'index');

            if (! $this->files->exists(dirname($path))) {
                $this->files->makeDirectory(dirname($path), 0755, true);
            }

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
        $stub = str_replace('{{ dummyModel }}', Str::plural(lcfirst($model)), $stub);
        $stub = str_replace('{{ fields }}', $this->splitFields($fields), $stub);

        return $stub;
    }

    protected function splitFields($fields)
    {
        $parsedFields = collect(array_map('trim', explode(',', $fields)))
            ->map(function ($thing) {
                return "'${thing}'";
            })
            ->join(', ');

        return "[{$parsedFields}]";
    }
}
