<?php namespace EscapeWork\Tray;

class CustomerTest extends \PHPUnit_Framework_TestCase
{

    public function testSetNameWorks()
    {
        $customer = new Customer();
        $customer->setName('Luís Dalmolin');

        $this->assertEquals('Luís Dalmolin', $customer->getName());
    }

    public function testSetTokenTransactionWorks()
    {
        $customer = new Customer();
        $customer->setCpf('99999999999');

        $this->assertEquals('99999999999', $customer->getCpf());
    }

    public function testSetEmailWorks()
    {
        $customer = new Customer();
        $customer->setEmail('luis.nh@gmail.com');

        $this->assertEquals('luis.nh@gmail.com', $customer->getEmail());
    }
}