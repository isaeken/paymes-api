<?php


namespace IsaEken\Paymes;


use IsaEken\Paymes\Traits\HasAttributes;

/**
 * Class Callback
 * @package IsaEken\Paymes
 * @method self setPaymesOrderId(string $value)
 * @method self setOrderId(string $value)
 * @method self setType(string $value)
 * @method self setMessage(string $value)
 * @method self setPrice(string $value)
 * @method self setCurrency(string $value)
 * @method self setHash(string $value)
 * @method string getPaymesOrderId()
 * @method string getOrderID()
 * @method string getType()
 * @method string getMessage()
 * @method string getPrice()
 * @method string getCurrency()
 * @method string getHash()
 */
class Callback extends Model
{
    use HasAttributes;

    /**
     * @var array $attributes
     */
    protected array $attributes = [
        'paymesOrderId',
        'orderId',
        'type',
        'message',
        'price',
        'currency',
        'hash',
    ];

    /**
     * @return bool
     */
    public function status(): bool
    {
        return $this->getAttribute('type') == 'success';
    }
}
