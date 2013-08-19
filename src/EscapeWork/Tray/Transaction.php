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
     * The payment object
     * 
     * @var EscapeWork\Tray\Payment
     */
    public $payment;

    /**
     * The customer object
     * 
     * @var EscapeWork\Tray\Customer
     */
    public $customer;

    /**
     * Products
     * 
     * @var array
     */
    public $products = array();

    /**
     * Max token_transaction characters
     */
    const MAX_TOKEN_TRANSACTION_CHARACTERS = 32;

    /**
     * Setting the transaction token
     */
    public function setTokenTransaction($token_transaction)
    {
        if (strlen($token_transaction) <= self::MAX_TOKEN_TRANSACTION_CHARACTERS) {
            $this->token_transaction = $token_transaction;
            return $this;
        }

        throw new InvalidArgumentException("O número máximo de caracters do token_transaction é 32");
    }

    /**
     * Getting the token transaction
     */
    public function getTokenTransaction()
    {
        return $this->token_transaction;
    }

    /**
     * Setting the order number
     */
    public function setOrderNumber($order_number)
    {
        $this->order_number = $order_number;
        return $this;
    }

    /**
     * Getting the order number
     */
    public function getOrderNumber()
    {
        return $this->order_number;
    }

    /**
     * Setting the free element
     */
    public function setFree($free)
    {
        $this->free = $free;
        return $this;
    }

    /**
     * Getting the free field
     */
    public function getFree()
    {
        return $this->free;
    }

    /**
     * Setting the transaction id
     */
    public function setTransactionId($transaction_id)
    {
        $this->transaction_id = $transaction_id;

        if (! is_numeric($this->transaction_id)) {
            throw new InvalidArgumentException('transaction_id precisa ser um número inteiro.');
        }

        return $this;
    }

    /**
     * Getting the transaction id
     */
    public function getTransactionId()
    {
        return $this->transaction_id;
    }

    /**
     * Setting the status name
     */
    public function setStatusName($status_name)
    {
        $this->status_name = $status_name;
        return $this;
    }

    /**
     * Getting the status name
     */
    public function getStatusName()
    {
        return $this->status_name;
    }

    /**
     * Setting the status ID
     */
    public function setStatusId($status_id)
    {
        $this->status_id = $status_id;

        if (! is_numeric($this->status_id)) {
            throw new InvalidArgumentException('status_id precisa ser um número inteiro.');
        }

        return $this;
    }

    /**
     * Getting the status ID
     */
    public function getStatusId()
    {
        return $this->status_id;
    }

    /**
     * Setting the payment object
     */
    public function setPayment(Payment $payment)
    {
        $this->payment = $payment;
    }

    /**
     * Setting the customer object
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Adding a new product
     */
    public function addProduct(array $params = array())
    {
        $this->products[] = new Product($params);
    }

    /**
     * Creating the transaction
     */
    public function create()
    {
        # $cURL = cur
    }
}