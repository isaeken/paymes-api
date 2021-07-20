<?php


namespace IsaEken\Paymes;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Str;
use InvalidArgumentException;
use IsaEken\Paymes\Responses\OrderCancelResponse;
use IsaEken\Paymes\Traits\HasAttributes;

/**
 * Class Payment
 * @package IsaEken\Paymes
 * @method self setPaymesOrderId(string $value)
 * @method self setPublicKey(string $value)
 * @method string getPaymesOrderId()
 * @method string getPublicKey()
 */
class OrderCancel extends Model
{
    use HasAttributes;

    /**
     * @var array $attributes
     */
    protected array $attributes = [
        'paymesOrderId' => null,
        'publicKey' => null,
    ];

    /**
     * @return OrderCancelResponse
     * @throws GuzzleException
     */
    public function run(): OrderCancelResponse
    {
        foreach ($this->attributes as $key => $value) {
            if ($value === null) {
                throw new InvalidArgumentException;
            }
        }

        $client = new Client([
            'verify' => false,
        ]);

        $post = $client->post(Str::replace('https://api.paym.es/v4.5/order_cancel/{paymesOrderId}', '{paymesOrderId}', $this->getPaymesOrderId()), [
            'form_params' => $this->attributes,
        ]);

        return new OrderCancelResponse(json_decode($post->getBody()->getContents(), true));
    }
}
