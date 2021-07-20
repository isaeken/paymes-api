<?php


namespace IsaEken\Paymes\Responses;


use Illuminate\Support\Str;
use IsaEken\Paymes\Traits\HasAttributes;

class InstallmentResponse extends Response
{
    /**
     * @var array $attributes
     */
    public array $attributes = [
        '1' => null,
        '2' => null,
        '3' => null,
        '4' => null,
        '5' => null,
        '6' => null,
        '7' => null,
        '8' => null,
        '9' => null,
        '10' => null,
        '11' => null,
        '12' => null,
    ];
}
