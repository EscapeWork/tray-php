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
        $price_discount,
        $postal_code_seller,
        $shipping_type,
        $shipping_price;

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
     * Constructor
     */
    public function __construct()
    {
        $this->payment  = new Payment();
        $this->customer = new Customer();
    }

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
            throw new InvalidArgumentException('transaction_id ('.$transaction_id.') precisa ser um número inteiro.');
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
     * Setting the postal_code_seller element
     */
    public function setPostalCodeSeller($postal_code_seller)
    {
        $this->postal_code_seller = $postal_code_seller;
        return $this;
    }

    /**
     * Getting the postal_code_seller field
     */
    public function getPostalCodeSeller()
    {
        return $this->postal_code_seller;
    }

    /**
     * Setting the shipping_type element
     */
    public function setShippingType($shipping_type)
    {
        $this->shipping_type = $shipping_type;
        return $this;
    }

    /**
     * Getting the shipping_type field
     */
    public function getShippingType()
    {
        return $this->shipping_type;
    }

    /**
     * Setting the shipping_price element
     */
    public function setShippingPrice($shipping_price)
    {
        $this->shipping_price = $shipping_price;
        return $this;
    }

    /**
     * Getting the shipping_type field
     */
    public function getShippingPrice()
    {
        return $this->shipping_price;
    }

    /**
     * Adding a new product
     */
    public function addProduct(array $params = array())
    {
        $this->products[] = new Product($params);
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
            'postal_code_seller' => $this->getPostalCodeSeller(),
            'shipping_type'      => $this->getShippingType(),
            'shipping_price'     => $this->getShippingPrice(),
            'url_notification'   => $this->getUrlNotification(),
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

    /**
     * Creating the temporary cary
     */
    public function create()
    {
        $client  = $this->createClient();
        $request = $client->post(Config::getBaseURL() . Config::getCartURL(), array(), $this->getDataArray());
        $xml     = $this->buildXML((string) $request->send()->getBody());

        if ((string) $xml->message_response->message !== 'success') {
            throw new TrayException('Notification error');
        }

        $this->setTokenTransaction($xml->data_response->token_transaction);
        $this->setUrl($xml->data_response->url_car);
    }

    /**
     * Making a request to get the notification
     */
    public function notification()
    {
        $data = array(
            'token_account'     => Config::getTokenAccount(),
            'token_transaction' => $this->getTokenTransaction(),
        );

        $client   = $this->createClient();
        $request  = $client->post(Config::getBaseURL() . Config::getNotificationURL(), array(), $data);
        $response = $this->buildXML((string) $request->send()->getBody());

        if ((string) $response->message_response->message !== 'success') {
            throw new TrayException('Notification error');
        }

        $this->setDataFromObject($response);
    }

    /**
     * Create the HTTP client
     */
    public function createClient()
    {
        return new Client();
    }

    /**
     * Building the XML
     */
    public function buildXML($xmlString)
    {
        return @simplexml_load_string($xmlString);
    }

    /**
     * Setting the transaction data from an PHP object
     *
     * @param   stdClass $response
     * @return  void
     */
    public function setDataFromObject($response)
    {
        $transaction = $response->data_response->transaction;

        $this->setOrderNumber($transaction->order_number);
        $this->setFree($transaction->free);
        $this->setTransactionId($transaction->transaction_id);
        $this->setStatusId($transaction->status_id);
        $this->setStatusName($transaction->status_name);
        $this->setTokenTransaction($transaction->token_transaction);

        # payment
        $this->payment->setPricePayment($transaction->payment->price_payment);
        $this->payment->setPaymentResponse($transaction->payment->payment_response);
        $this->payment->setUrlPayment($transaction->payment->url_payment);
        $this->payment->setTid($transaction->payment->tid);
        $this->payment->setSplit($transaction->payment->split);
        $this->payment->setPaymentMethodId($transaction->payment->payment_method_id);
        $this->payment->setPaymentMethodName($transaction->payment->payment_method_name);
        $this->payment->setLinhaDigitavel($transaction->payment->linha_digitavel);
    }
}