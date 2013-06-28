<?php namespace EscapeWork\Tray;

class PaymentTest extends \PHPUnit_Framework_TestCase
{

    public function testSetPricePaymentWorks()
    {
        $payment = new Payment();
        $payment->setPricePayment(20.00);

        $this->assertEquals(20.00, $payment->getPricePayment());
    }

    public function testSetPaymentResponseWorks()
    {
        $payment = new Payment();
        $payment->setPaymentResponse('Negada');

        $this->assertEquals('Negada', $payment->getPaymentResponse());
    }

    public function testUrlPaymentWorks()
    {
        $payment = new Payment();
        $payment->setUrlPayment('https://google.com');

        $this->assertEquals('https://google.com', $payment->getUrlPayment());
    }

    public function testSetTidWorks()
    {
        $payment = new Payment();
        $payment->setTid(133);

        $this->assertEquals(133, $payment->getTid());
    }

    public function testSetSplitWorks()
    {
        $payment = new Payment();
        $payment->setSplit(1);

        $this->assertEquals(1, $payment->getSplit());
    }

    public function testSetPaymentMethodIdWorks()
    {
        $payment = new Payment();
        $payment->setPaymentMethodId(1);

        $this->assertEquals(1, $payment->getPaymentMethodId());
    }

    public function testSetPaymentMethodNameWorks()
    {
        $payment = new Payment();
        $payment->setPaymentMethodName('Martercard');

        $this->assertEquals('Martercard', $payment->getPaymentMethodName());
    }

    public function testSetLinhaDigitavelWorks()
    {
        $payment = new Payment();
        $payment->setLinhaDigitavel('ABC');

        $this->assertEquals('ABC', $payment->getLinhaDigitavel());
    }
}