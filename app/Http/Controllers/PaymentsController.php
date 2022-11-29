<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Services\Payment\Exceptions\PaymentException;
use App\Services\Payment\PaymentService;
use App\Services\Payment\Requests\PaystarRequest;
use App\Services\Payment\Requests\PaystarVerifyRequest;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Pay the Checkout
     *
     * @param  App\Http\Requests\PaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function pay(PaymentRequest $request)
    {
        Payment::create([
            'amount' => $request->amount,
            'order_id' => $request->order_id,
            'card_number' => $request->card_number,
            'owner_id' => auth()->user()->id,
        ]);

        $data = [
            'user' => auth()->user(),
            'amount' => $request->amount,
            'order_id' => $request->order_id
        ];

        $payRequest = new PaystarRequest($data);

        $payment = new PaymentService(PaymentService::PAYSTAR, $payRequest);

        return $payment->pay();
    }

    /**
     * Callback from Payment
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function callback(Request $request)
    {
        $payment = Payment::where('order_id',$request->order_id)->first();

        if ($request->status != 1) {
            return redirect()->route('invoice', ['status' => $request->status , 'payment_id' => $payment->id]);
        }

        if($request->card_number != $payment->card_number){
            return redirect()->route('invoice', ['status' => -10 , 'payment_id' => $payment->id]);
        }

        $data = [
            'amount' => $payment->amount,
            'ref_num' => $request->ref_num,
            'card_number' => $request->card_number,
            'tracking_code' => $request->tracking_code,
        ];

        $verifyRequest = new PaystarVerifyRequest($data);

        $payment = new PaymentService(PaymentService::PAYSTAR, $verifyRequest);

        if($payment->verify()){
            Payment::where('order_id',$request->order_id)->update([
                'transaction_id' => $request->transaction_id,
                'ref_code' => $request->ref_num,
                'status' => 'paied',
            ]);
            return redirect()->route('invoice', ['status' => 1 , 'payment_id' => $payment->id]);
        }else{
            return redirect()->route('invoice', ['status' => -11 , 'payment_id' => $payment->id]);
        }
    }

    /**
     * Display the specified invoice.
     *
     * @param  int  $status
     * @return \Illuminate\Http\Response
     */
    public function show($payment_id, $status)
    {
        if($status != 1){
            $message = (new PaymentException($status))->message();
        }else{
            $message = 'سفارش با موفقیت پرداخت شد!';
        }

        $payment = Payment::find($payment_id);

        return view('payment.invoice' , [
            'payment' => $payment,
            'status' => $status,
            'message' => $message
        ]);
    }
}
