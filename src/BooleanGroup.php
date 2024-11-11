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

    public $fullWidth = true;

    /**
     * Set the field to use all the available white-space.
     *
     * @return $this
     */
    public function cancelFullWidth()
    {
        $this->fullWidth = false;
        return $this;
    }
}
