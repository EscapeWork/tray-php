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

    public function setPricePayment($price_payment)
    {
        $this->price_payment = $price_payment;
        return $this;
    }

    public function setPaymentResponse($payment_response)
    {
        $this->payment_response = $payment_response;
        return $this;
    }

    public function setUrlPayment($url_payment)
    {
        $this->url_payment = $url_payment;
        return $this;
    }

    public function setTid($tid)
    {
        $this->tid = $tid;
        return $this;
    }

    public function setSplit($split)
    {
        $this->split = $split;
        return $this;
    }

    public function setPaymentMethodId($payment_method_id)
    {
        $this->payment_method_id = $payment_method_id;
        return $this;
    }

    public function setPaymentMethodName($payment_method_name)
    {
        $this->payment_method_name = $payment_method_name;
        return $this;
    }

    public function setLinhaDigitavel($linha_digitavel)
    {
        $this->linha_digitavel = $linha_digitavel;
        return $this;
    }

    public function getPricePayment()
    {
        return $this->price_payment;
    }

    public function getPaymentResponse()
    {
        return $this->payment_response;
    }

    public function getUrlPayment()
    {
        return $this->url_payment;
    }

    public function getTid()
    {
        return $this->tid;
    }

    public function getSplit()
    {
        return $this->split;
    }

    public function getPaymentMethodId()
    {
        return $this->payment_method_id;
    }

    public function getPaymentMethodName()
    {
        return $this->payment_method_name;
    }

    public function getLinhaDigitavel()
    {
        return $this->linha_digitavel;
    }
}