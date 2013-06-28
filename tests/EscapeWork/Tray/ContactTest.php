<?php namespace EscapeWork\Tray;

class ContactTest extends \PHPUnit_Framework_TestCase
{

    public function testSetValueWorks()
    {
        $contact = new Contact();
        $contact->setValue('1434065858');

        $this->assertEquals('1434065858', $contact->getValue());
    }

    public function testSetTypeContactWorks()
    {
        $contact = new Contact();
        $contact->setTypeContact('H');

        $this->assertEquals('H', $contact->getTypeContact());
    }
}