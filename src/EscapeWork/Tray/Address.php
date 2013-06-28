<?php namespace EscapeWork\Tray;

class Address
{

    /**
     * Customer variables
     */
    protected 
        $street, 
        $number, 
        $neighborhood, 
        $postal_code, 
        $completion, 
        $city, 
        $state;

    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }

    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = $neighborhood;
        return $this;
    }

    public function setPostalCode($postal_code)
    {
        $this->postal_code = $postal_code;
        return $this;
    }

    public function setCompletion($completion)
    {
        $this->completion = $completion;
        return $this;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    public function getPostalCode()
    {
        return $this->postal_code;
    }

    public function getCompletion()
    {
        return $this->completion;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getState()
    {
        return $this->state;
    }
}