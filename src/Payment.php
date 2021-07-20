<?php


namespace IsaEken\Paymes;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Str;
use InvalidArgumentException;
use IsaEken\Paymes\Responses\PaymentResponse;
use IsaEken\Paymes\Traits\HasAttributes;

/**
 * Class Payment
 * @package IsaEken\Paymes
 * @method self setSecretKey(string $value)
 * @method self setPublicKey(string $value)
 * @method self setOrderId(string $value)
 * @method self setPrice(string $value)
 * @method self setCurrency(string $value)
 * @method self setProductName(string $value)
 * @method self setBuyerName(string $value)
 * @method self setBuyerPhone(string $value)
 * @method self setBuyerEmail(string $value)
 * @method self setBuyerAddress(string $value)
 * @method self setHash(string $value)
 * @method string getSecretKey()
 * @method string getPublicKey()
 * @method string getOrderId()
 * @method string getPrice()
 * @method string getCurrency()
 * @method string getProductName()
 * @method string getBuyerName()
 * @method string getBuyerPhone()
 * @method string getBuyerEmail()
 * @method string getBuyerAddress()
 * @method string getHash()
 */
class Payment extends Model
{
    use HasAttributes;

    /**
     * @var array $attributes
     */
    protected array $attributes = [
        'secretKey' => null,
        'publicKey' => null,
        'orderId' => null,
        'price' => null,
        'currency' => null,
        'productName' => null,
        'buyerName' => null,
        'buyerPhone' => null,
        'buyerEmail' => null,
        'buyerAddress' => null,
        'hash' => null,
    ];

    /**
     * @return $this
     */
    public function makeHash(): self
    {
        $this->setHash(Hash::make(
            $this->getOrderId(),
            $this->getPrice(),
            $this->getCurrency(),
            $this->getProductName(),
            $this->getBuyerName(),
            $this->getBuyerPhone(),
            $this->getBuyerEmail(),
            $this->getBuyerAddress(),
            $this->getSecretKey(),
        ));
        return $this;
    }

    /**
     * @return PaymentResponse
     * @throws GuzzleException
     */
    public function run(): PaymentResponse
    {
        foreach ($this->attributes as $key => $value) {
            if ($value === null) {
                throw new InvalidArgumentException;
            }
        }

        $this->setAttribute('hash', Hash::make(
            $this->getAttribute('orderId'),
            $this->getAttribute('price'),
            $this->getAttribute('currency'),
            $this->getAttribute('productName'),
            $this->getAttribute('buyerName'),
            $this->getAttribute('buyerPhone'),
            $this->getAttribute('buyerEmail'),
            $this->getAttribute('buyerAddress'),
            $this->getAttribute('secretKey'),
        ));

        $client = new Client([
            'verify' => false,
        ]);

        $post = $client->post('https://api.paym.es/v4.5/order_create', [
            'form_params' => $this->attributes,
        ]);

        return new PaymentResponse(json_decode($post->getBody()->getContents(), true));
    }
}
