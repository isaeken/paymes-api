<?php


namespace IsaEken\Paymes\Responses;


use IsaEken\Paymes\Traits\HasAttributes;

class Response
{
    use HasAttributes;

    /**
     * Response constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        if (count($attributes)) {
            $this->attributes = $attributes;
        }
    }
}
