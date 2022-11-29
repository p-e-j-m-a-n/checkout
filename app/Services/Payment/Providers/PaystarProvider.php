<?php

namespace App\Services\Payment\Providers;

use App\Services\Payment\Contracts\AbstractProviderInterface;
use App\Services\Payment\Contracts\PayableInterface;
use App\Services\Payment\Contracts\VerifiableInterface;
use App\Services\Payment\Exceptions\PaymentException;

class PaystarProvider extends AbstractProviderInterface implements PayableInterface, VerifiableInterface
{
    public function pay()
    {
        $params = [
            'order_id' => $this->request->getOrderId(),
            'amount' => $this->request->getAmount(),
            'mail' => $this->request->getUserEmail(),
            'callback' => route('payment.callback'),
            'callback_method' => 1,
            'sign' => $this->request->getSign(),
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://core.paystar.ir/api/pardakht/create',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($params),
            CURLOPT_HTTPHEADER => ["Authorization: Bearer " . $this->request->getGatewayId(), "Content-Type: application/json"],
        ]);

        $response = json_decode(curl_exec($curl), true);

        curl_close($curl);

        if ($response['status'] != 1) {
            throw new PaymentException($response['status']);
        }

        $link = 'https://core.paystar.ir/api/pardakht/payment?token=' . $response['data']['token'];

        return redirect()->away($link);
    }
    public function verify()
    {
        try {
            $params = [
                'amount' => $this->request->getAmount(),
                'ref_num' => $this->request->getRefNum(),
                'sign' => $this->request->getSign(),
            ];
    
            $curl = curl_init();
    
            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://core.paystar.ir/api/pardakht/verify',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($params),
                CURLOPT_HTTPHEADER => ["Authorization: Bearer " . $this->request->getGatewayId(), "Content-Type: application/json"],
            ]);


            $response = json_decode(curl_exec($curl), true);

            if ($response['status'] != 1) {
                throw new \Exception($response['message']);
            }

            return true;
        } catch (\Exception $e) {
        }
    }
}
