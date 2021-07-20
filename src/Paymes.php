<?php


namespace IsaEken\Paymes;


use Illuminate\Support\Str;

class Paymes
{
    public string $secretKey;
    public string $publicKey;
    public string $orderId;
    public string $price;
    public string $currency;
    public string $productName;
    public string $buyerName;
    public string $buyerPhone;
    public string $buyerEmail;
    public string $buyerAddress;

    public function payment(): Payment
    {
        return (new Payment())
            ->setSecretKey($this->secretKey)
            ->setPublicKey($this->publicKey)
            ->setOrderId($this->orderId)
            ->setPrice($this->price)
            ->setCurrency($this->currency)
            ->setProductName($this->productName)
            ->setBuyerName($this->buyerName)
            ->setBuyerPhone($this->buyerPhone)
            ->setBuyerEmail($this->buyerEmail)
            ->setBuyerAddress($this->buyerAddress)
            ->makeHash();
    }

    /**
     * @param string $paymesOrderId
     * @return OrderCancel
     */
    public function cancel(string $paymesOrderId): OrderCancel
    {
        return (new OrderCancel())
            ->setPaymesOrderId($paymesOrderId)
            ->setPublicKey($this->publicKey);
    }
}
