<?php namespace EscapeWork\Tray;

class Customer
{

    /**
     * Customer variables
     */
    protected 
        $name, 
        $cpf, 
        $email;

    /**
     * A customer has many address
     */
    public $addresses = array();

    /**
     * A customer has many contacts
     */
    public $contacts = array();

    /**
     * Setting a new address
     */
    public function setAddress(Address $address)
    {
        $this->addresses[] = $address;
    }

    /**
     * Setting a new contact
     */
    public function setContact(Contact $contact)
    {
        $this->contacts = $contact;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getEmail()
    {
        return $this->email;
    }
}