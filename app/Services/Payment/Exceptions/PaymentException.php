<?php

namespace App\Services\Payment\Exceptions;

use function PHPUnit\Framework\returnSelf;

class PaymentException
{
    public function __construct(public int $status_code)
    {
    }

    public function message(){
        switch ($this->status_code) {
            case -1:
                return (string)("درخواست نامعتبر!");
                break;
            case -2:
                return (string)("درگاه فعال نیست!");
                break;
            case -3:
                return (string)("توکن تکراری است!");
                break;
            case -4:
                return (string)("مبلغ بیشتر از سقف مجاز درگاه است!");
                break;
            case -5:
                return (string)("شناسه ref_num معتبر نیست!");
                break;
            case -6:
                return (string)("تراکنش قبلا وریفای شده است!");
                break;
            case -7:
                return (string)("تراکنش قبلا وریفای شده است!");
                break;
            case -8:
                return (string)("تراکنش را نمیتوان وریفای کرد!");
                break;
            case -9:
                return (string)("تراکنش وریفای نشد!");
                break;
            case -10:
                return (string)("شماره کارت پرداختی با شماره کارت انتخاب شده هم خوانی ندارد!!");
                break;
            case -98:
                return (string) ("تراکنش ناموفق!");
                break;
            case -99:
                return (string) ("خطای سامانه!");
                break;
            default:
            return (string) ("خطای غیر منتظره!");
        }
    }
}
