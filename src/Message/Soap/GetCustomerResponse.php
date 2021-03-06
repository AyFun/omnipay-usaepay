<?php

namespace Omnipay\USAePay\Message\Soap;

use Omnipay\Common\Message\AbstractResponse;

/**
 * USAePay SOAP Response
 *
 * This is the response class for all USAePay requests.
 *
 * @see \Omnipay\USAePay\Gateway
 */
class GetCustomerResponse extends AbstractResponse {

    public function __construct($request, $data) {
        $this->request = $request;
        $this->data = $this->decodeData($data);
    }

    public function decodeData($data) {
        return $data;
    }

    public function isSuccessful() {
        return true;
    }

    public function getCardReference() {
        return $this->data->CustNum;
    }
    
    public function getCustomerPaymentMethod() {
        return $this->data->PaymentMethods[0];
    }
    
    public function getCardPaymentMethodReference() {
        return $this->data->PaymentMethods[0]->MethodID;
    }
    
    public function getCustomerBillingAddress() {
        return $this->data->BillingAddress;
    }

}
