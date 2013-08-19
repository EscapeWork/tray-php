<?php namespace EscapeWork\Tray;

use Guzzle\Http\Client;
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
        $status_id,
        $url_seller,
        $url_notification,
        $price_discount;

    /**
     * URL for the action page
     */
    public $url;

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
     * Setting the url_seller
     */
    public function setUrlSeller($url_seller)
    {
        $this->url_seller = $url_seller;
        return $this;
    }

    /**
     * Getting the url_seller
     */
    public function getUrlSeller()
    {
        return $this->url_seller;
    }

    /**
     * Setting the url_notification
     */
    public function setUrlNotification($url_notification)
    {
        $this->url_notification = $url_notification;
        return $this;
    }

    /**
     * Getting the url_notification
     */
    public function getUrlNotification()
    {
        return $this->url_notification;
    }

    /**
     * Setting the price_discount
     */
    public function setPriceDiscount($price_discount)
    {
        $this->price_discount = $price_discount;
        return $this;
    }

    /**
     * Getting the price_discount
     */
    public function getPriceDiscount()
    {
        return $this->price_discount;
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
     * Setting the URL for the action who is beign made
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Returning the URL
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Adding a new product
     */
    public function addProduct(array $params = array())
    {
        $this->products[] = new Product($params);
    }

    /**
     * Creating the temporary cary
     */
    public function create()
    {
        $client  = new Client();
        $request = $client->post(Config::getBaseURL() . Config::getCartURL(), array(), $this->getDataArray());
        $result  = (string) $request->send()->getBody();

        $xml = @simplexml_load_string($result);
        $this->setTokenTransaction($xml->data_response->token_transaction);
        $this->setUrl($xml->data_response->url_car);
    }

    /**
     * Returning the array of the data for
     */
    public function getDataArray()
    {
        $data = array(
            'token_account'      => Config::getTokenAccount(),
            'url_seller'         => $this->getUrlSeller(),
            'price_discount'     => $this->getPriceDiscount(),
            'postal_code_seller' => '91780010',
            'shipping_type'      => 'Frete Grátis',
            'shipping_price'     => '0',
        );

        return array_merge($data, $this->getProductsDataArray());
    }

    /**
     * Returning the products data array
     */
    protected function getProductsDataArray()
    {
        $products = array();

        foreach ($this->products as $product) {
            $products = array(
                'transaction_product[][code]'        => $product->getCode(),
                'transaction_product[][description]' => $product->getDescription(),
                'transaction_product[][quantity]'    => $product->getQuantity(),
                'transaction_product[][price_unit]'  => $product->getPriceUnit(),
                'transaction_product[][sku_code]'    => $product->getSkuCode(),
            );
        }

        return $products;
    }
}