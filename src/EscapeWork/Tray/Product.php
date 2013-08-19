<?php namespace EscapeWork\Tray;

class Product
{

    /**
     * Description
     *
     * @var  string
     */
    protected $description;

    /**
     * Quantity
     *
     * @var  int
     */
    protected $quantity;

    /**
     * Price unit
     *
     * @var  float
     */
    protected $price_unit;

    /**
     * Code
     *
     * @var  string
     */
    protected $code;

    /**
     * Extra
     *
     * @var  string
     */
    protected $extra;

    /**
     * URL img
     *
     * @var  string
     */
    protected $url_img;

    /**
     * SKU code
     *
     * @var  string
     */
    protected $sku_code;

    /**
     * Constructor
     *
     * @param  array $params
     */
    public function __construct(array $params = array())
    {
        $this->setAttributes($params);
    }

    /**
     * Setting the atributes
     */
    protected function setAttributes($params)
    {
        if (isset($params['description'])) {
            $this->setDescription($params['description']);
        }

        if (isset($params['quantity'])) {
            $this->setQuantity($params['quantity']);
        }

        if (isset($params['price_unit'])) {
            $this->setPriceUnit($params['price_unit']);
        }

        if (isset($params['code'])) {
            $this->setCode($params['code']);
        }

        if (isset($params['extra'])) {
            $this->setExtra($params['extra']);
        }

        if (isset($params['url_img'])) {
            $this->setUrlImg($params['url_img']);
        }

        if (isset($params['sku_code'])) {
            $this->setSkuCode($params['sku_code']);
        }
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function setPriceUnit($price_unit)
    {
        $this->price_unit = $price_unit;
        return $this;
    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    public function setExtra($extra)
    {
        $this->extra = $extra;
        return $this;
    }

    public function setUrlImg($url_img)
    {
        $this->url_img = $url_img;
        return $this;
    }

    public function setSkuCode($sku_code)
    {
        $this->sku_code = $sku_code;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getPriceUnit()
    {
        return $this->price_unit;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getExtra()
    {
        return $this->extra;
    }

    public function getUrlImg()
    {
        return $this->url_img;
    }

    public function getSkuCode()
    {
        return $this->sku_code;
    }

    /**
     * Serializing the product
     */
    public function __toString()
    {
        return array(
            'description' => $this->getDescription(),
            'quantity'    => $this->getQuantity(),
            'price_unit'  => $this->getPriceUnit(),
            'code'        => $this->getCode(),
            'extra'       => $this->getExtra(),
            'url_img'     => $this->getUrlImg(),
            'sku_code'    => $this->getSkuCode(),
        );
    }
}