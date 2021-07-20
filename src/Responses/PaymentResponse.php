<?php


namespace IsaEken\Paymes\Responses;


use Illuminate\Support\Str;
use IsaEken\Paymes\Traits\HasAttributes;

/**
 * Class PaymentResponse
 * @package IsaEken\Paymes\Responses
 * @method self setStatus(string $value)
 * @method self setMessage(string $value)
 * @method self setReturnUrl(string $value)
 * @method self setPaymesOrderId(string $value)
 * @method string getStatus()
 * @method string getMessage()
 * @method string getReturnUrl()
 * @method string getPaymesOrderId()
 */
class PaymentResponse extends Response
{
    /**
     * @var array $attributes
     */
    public array $attributes = [
        'status' => null,
        'message' => null,
        'returnUrl' => null,
        'paymesOrderId' => null,
    ];
}
