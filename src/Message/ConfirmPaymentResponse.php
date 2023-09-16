<?php

namespace Omnipay\Ameria\Message;

class ConfirmPaymentResponse extends Response
{
    public function isSuccessful(): bool
    {
        return $this->getCode() === static::PAYMENT_COMPLETED;
    }
}