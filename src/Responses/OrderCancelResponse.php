<?php


namespace IsaEken\Paymes\Responses;


use Illuminate\Support\Str;
use IsaEken\Paymes\Traits\HasAttributes;

/**
 * Class OrderCancelResponse
 * @package IsaEken\Paymes\Responses
 * @method self setType(string $value)
 * @method self setMessage(string $value)
 * @method string getType()
 * @method string getMessage()
 */
class OrderCancelResponse extends Response
{
    /**
     * @var array $attributes
     */
    public array $attributes = [
        'type' => null,
        'message' => null,
    ];
}
