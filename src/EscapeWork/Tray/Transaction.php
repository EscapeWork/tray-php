<?php namespace EscapeWork\Tray;

use InvalidArgumentException;

class Transaction
{

    /**
     * Transactions variables
     */
    protected 
        $token_transaction, 
        $order_number, 
        $free, 
        $transaction_id, 
        $status_name, 
        $status_id;

    /**
     * the payment object
     * 
     * @var EscapeWork\Tray\Payment
     */
    public $payment;

    /**
     * the customer object
     * 
     * @var EscapeWork\Tray\Customer
     */
    public $customer;

    /**
     * Max token_transaction characters
     */
    const MAX_TOKEN_TRANSACTION_CHARACTERS = 32;

    public function setTokenTransaction($token_transaction)
    {
        if (strlen($token_transaction) <= self::MAX_TOKEN_TRANSACTION_CHARACTERS) {
            $this->token_transaction = $token_transaction;
            return $this;
        }

        throw new InvalidArgumentException("O número máximo de caracters do token_transaction é 32");
    }

    public function getTokenTransaction()
    {
        return $this->token_transaction;
    }

    public function setOrderNumber($order_number)
    {
        $this->order_number = $order_number;
        return $this;
    }

    public function getOrderNumber()
    {
        return $this->order_number;
    }

    public function setFree($free)
    {
        $this->free = $free;
        return $this;
    }

    public function getFree()
    {
        return $this->free;
    }

    public function setTransactionId($transaction_id)
    {
        $this->transaction_id = $transaction_id;

        if (! is_numeric($this->transaction_id)) {
            throw new InvalidArgumentException('transaction_id precisa ser um número inteiro.');
        }

        return $this;
    }

    public function getTransactionId()
    {
        return $this->transaction_id;
    }

    public function setStatusName($status_name)
    {
        $this->status_name = $status_name;
        return $this;
    }

    public function getStatusName()
    {
        return $this->status_name;
    }

    public function setStatusId($status_id)
    {
        $this->status_id = $status_id;

        if (! is_numeric($this->status_id)) {
            throw new InvalidArgumentException('status_id precisa ser um número inteiro.');
        }

        return $this;
    }

    public function getStatusId()
    {
        return $this->status_id;
    }

    public function setPayment(Payment $payment)
    {
        $this->payment = $payment;
    }

    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
    }
}