<?php

namespace Marshmallow\BooleanGroup;

use Laravel\Nova\Fields\BooleanGroup as NovaBooleanGroup;

class BooleanGroup extends NovaBooleanGroup
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'boolean-group';
}
