<?php namespace EscapeWork\Tray;

use InvalidArgumentException;

class Payment
{

    /**
     * Payment variables
     */
    protected 
        $price_payment, 
        $payment_response, 
        $url_payment, 
        $tid, 
        $split, 
        $payment_method_id, 
        $payment_method_name, 
        $linha_digitavel;

    /**
     * Setting the payment price
     */
    public function setPricePayment($price_payment)
    {
        $this->price_payment = $price_payment;
        return $this;
    }

    /**
     * Setting the payment response
     */
    public function setPaymentResponse($payment_response)
    {
        $this->payment_response = $payment_response;
        return $this;
    }

    /**
     * Setting the payment URL
     */
    public function setUrlPayment($url_payment)
    {
        $this->url_payment = $url_payment;
        return $this;
    }

    /**
     * Setting the TID
     */
    public function setTid($tid)
    {
        $this->tid = $tid;
        return $this;
    }

    /**
     * Setting the split
     */
    public function setSplit($split)
    {
        $this->split = $split;
        return $this;
    }

    /**
     * Setting the payment method id
     */
    public function setPaymentMethodId($payment_method_id)
    {
        $this->payment_method_id = $payment_method_id;
        return $this;
    }

    /**
     * Setting the payment method name
     */
    public function setPaymentMethodName($payment_method_name)
    {
        $this->payment_method_name = $payment_method_name;
        return $this;
    }

    /**
     * Setting the linha digitavel
     */
    public function setLinhaDigitavel($linha_digitavel)
    {
        $this->linha_digitavel = $linha_digitavel;
        return $this;
    }

    /**
     * Getting the payment price
     */
    public function getPricePayment()
    {
        return $this->price_payment;
    }

    /**
     * Getting the payment response
     */
    public function getPaymentResponse()
    {
        return $this->payment_response;
    }

    /**
     * Getting the payment URL
     */
    public function getUrlPayment()
    {
        return $this->url_payment;
    }

    /**
     * Getting the TID
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Getting the split
     */
    public function getSplit()
    {
        return $this->split;
    }

    /**
     * Getting the payment method ID
     */
    public function getPaymentMethodId()
    {
        return $this->payment_method_id;
    }

    /**
     * Getting the payment method name
     */
    public function getPaymentMethodName()
    {
        return $this->payment_method_name;
    }

    /**
     * Getting the linha digitavel
     */
    public function getLinhaDigitavel()
    {
        return $this->linha_digitavel;
    }
}