<?php

namespace App\Services\Payment;

use App\Services\Payment\Contracts\RequestInterface;
use App\Services\Payment\Exceptions\ProviderNotFoundException;

class PaymentService
{
    public const PAYSTAR = 'PaystarProvider';

    public function __construct(private string $providerName, private RequestInterface $request)
    {
    }
    public function pay()
    {
        return $this->findProvider()->pay();
    }
    public function verify()
    {
        return $this->findProvider()->verify();
    }
    private function findProvider()
    {
        $className = 'App\\Services\\Payment\\Providers\\' . $this->providerName;

        if(!class_exists($className))
        {
            throw new ProviderNotFoundException('درگاه پرداخت انتخاب شده پیدا نشد.');
        }

        return new $className($this->request);
    }
}