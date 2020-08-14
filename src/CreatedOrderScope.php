<?php

namespace Sfneal\Scopes;

class CreatedOrderScope extends OrderScope
{
    /**
     * CreatedOrderScope constructor.
     *
     * @param string $direction
     */
    public function __construct(string $direction = 'desc')
    {
        parent::__construct('created_at', $direction, false);
    }
}
