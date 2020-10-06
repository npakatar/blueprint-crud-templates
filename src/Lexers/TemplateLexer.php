<?php


namespace Npakatar\BlueprintCrudTemplates\Lexers;


use Blueprint\Contracts\Lexer;

class TemplateLexer implements Lexer
{
    public function analyze(array $tokens): array
    {
        $registry = [
            'templates' => []
        ];

        if (!empty($tokens['templates'])) {
            $registry['templates'] = $tokens['templates'];
        }

        return $registry;
    }
}
