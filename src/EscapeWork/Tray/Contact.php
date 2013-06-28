<?php namespace EscapeWork\Tray;

class Contact
{

    /**
     * Contact variables
     */
    protected 
        $value, 
        $type_contact;

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function setTypeContact($type_contact)
    {
        $this->type_contact = $type_contact;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getTypeContact()
    {
        return $this->type_contact;
    }
}