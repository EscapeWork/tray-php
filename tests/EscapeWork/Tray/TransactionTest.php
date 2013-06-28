<?php namespace EscapeWork\Tray;

class TransactionTest extends \PHPUnit_Framework_TestCase
{

    public function testSetTokenTransactionWorks()
    {
        $transaction = new Transaction();
        $transaction->setTokenTransaction('A7S6DYE5DTE6D5E');

        $this->assertEquals('A7S6DYE5DTE6D5E', $transaction->getTokenTransaction());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetTokenTransactionWithInvalidTokenShouldThrowAnException()
    {
        $transaction = new Transaction();
        $transaction->setTokenTransaction('A7S6DYE5DTE6D5EA7S6DYE5DTE6D5EA7S6DYE5DTE6D5E');
    }

    public function testSetOrderNumberWorks()
    {
        $transaction = new Transaction();
        $transaction->setOrderNumber('A7S6DYE5DTE6D5E');

        $this->assertEquals('A7S6DYE5DTE6D5E', $transaction->getOrderNumber());
    }

    public function testSetFreeWorks()
    {
        $transaction = new Transaction();
        $transaction->setFree('Lorem Ipsum');

        $this->assertEquals('Lorem Ipsum', $transaction->getFree());
    }

    public function testSetTransactionIdWorks()
    {
        $transaction = new Transaction();
        $transaction->setTransactionId(12345);

        $this->assertEquals(12345, $transaction->getTransactionId());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetTransactionIdWithInvalidTokenShouldThrowAnException()
    {
        $transaction = new Transaction();
        $transaction->setTransactionId('adsda');
    }

    public function testSetStatusNameWorks()
    {
        $transaction = new Transaction();
        $transaction->setStatusName('Cancelado');

        $this->assertEquals('Cancelado', $transaction->getStatusName());
    }

    public function testSetStatusIdWorks()
    {
        $transaction = new Transaction();
        $transaction->setStatusId(12345);

        $this->assertEquals(12345, $transaction->getStatusId());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetStatusIdWithInvalidTokenShouldThrowAnException()
    {
        $transaction = new Transaction();
        $transaction->setStatusId('adsda');
    }
}