<?php

namespace Npakatar\BlueprintCrudTemplates;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Npakatar\BlueprintCrudTemplates\Skeleton\SkeletonClass
 */
class BlueprintCrudTemplatesFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'blueprint-crud-templates';
    }
}
