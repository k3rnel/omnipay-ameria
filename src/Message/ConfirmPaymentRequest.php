<?php

namespace Omnipay\Ameria\Message;

class ConfirmPaymentRequest extends AbstractRequest
{
    public function getData(): array
    {
        $this->validate('transactionReference', 'amount');

        $data['PaymentID'] = $this->getTransactionReference();
        $data['Amount'] = $this->getAmount();

        return $data;
    }

    public function getEndpoint(): string
    {
        return $this->getUrl().'/ConfirmPayment';
    }

    /**
     * @param $data
     * @param array $headers
     *
     * @return \Omnipay\Ameria\Message\Response
     */
    protected function createResponse($data, array $headers = []): Response
    {
        return $this->response = new ConfirmPaymentResponse($this, $data, $headers);
    }
}