<?php


namespace IsaEken\Paymes;


use IsaEken\Paymes\Traits\HasAttributes;

class Hash
{
    /**
     * @param string $orderId
     * @param string $price
     * @param string $currency
     * @param string $productName
     * @param string $buyerName
     * @param string $buyerPhone
     * @param string $buyerEmail
     * @param string $buyerAddress
     * @param string $secretKey
     * @return string
     */
    public static function make(
        string $orderId,
        string $price,
        string $currency,
        string $productName,
        string $buyerName,
        string $buyerPhone,
        string $buyerEmail,
        string $buyerAddress,
        string $secretKey
    ): string
    {
        $string = "$orderId$price$currency$productName$buyerName$buyerPhone$buyerEmail$buyerAddress$secretKey";
        return base64_encode(hash('sha512', $string, true));
    }
}
