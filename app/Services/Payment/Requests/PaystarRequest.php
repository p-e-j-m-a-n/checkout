<?php

namespace App\Services\Payment\Requests;

use App\Services\Payment\Contracts\RequestInterface;

class PaystarRequest implements RequestInterface
{
    private $user;
    private $amount;
    private $order_id;
    public function __construct(array $data)
    {
        $this->user = $data['user'];
        $this->amount = $data['amount'];
        $this->order_id = $data['order_id'];
    }

    public function getUser()
    {
        return $this->user;
    }
    public function getAmount()
    {
        return $this->amount;
    }
    public function getOrderId()
    {
        return $this->order_id;
    }
    public function getUserEmail()
    {
        return $this->user->email;
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
        return $this->getAmount() . '#' . $this->getOrderId() . '#' . route('payment.callback');
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
