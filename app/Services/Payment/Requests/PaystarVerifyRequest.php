<?php

namespace App\Services\Payment\Requests;

use App\Services\Payment\Contracts\RequestInterface;

class PaystarVerifyRequest implements RequestInterface
{
    private $id;
    private $order_id;
    public function __construct(array $data)
    {
        $this->amount = $data['amount'];
        $this->ref_num = $data['ref_num'];
        $this->card_number = $data['card_number'];
        $this->tracking_code = $data['tracking_code'];
    }

    public function getAmount()
    {
        return $this->amount;
    }
    public function getRefNum()
    {
        return $this->ref_num;
    }
    public function getCardNumber()
    {
        return $this->card_number;
    }
    public function getTrackingCode()
    {
        return $this->tracking_code;
    }
    public function getGatewayId()
    {
        return config('services.gateways.paystar.gateway_id');
    }
    public function getAlgorithm()
    {
        return config('services.gateways.paystar.algorithm');
    }
    public function getPayload()
    {
        return $this->getAmount() . '#' . $this->getRefNum() . '#' . $this->getCardNumber() . '#' . $this->getTrackingCode();
    }
    public function getSecret()
    {
        return config('services.gateways.paystar.secret');
    }
    public function getSign()
    {
        return hash_hmac($this->getAlgorithm(), $this->getPayload(), $this->getSecret());
    }
}