<?php namespace EscapeWork\Tray;

class AddressTest extends \PHPUnit_Framework_TestCase
{

    public function testSetStreetWorks()
    {
        $address = new Address();
        $address->setStreet('Rua dos bobos');

        $this->assertEquals('Rua dos bobos', $address->getStreet());
    }

    public function testSetNumberWorks()
    {
        $address = new Address();
        $address->setNumber(666);

        $this->assertEquals(666, $address->getNumber());
    }

    public function testSetNeighborhoodWorks()
    {
        $address = new Address();
        $address->setNeighborhood('Jardim Paulistano');

        $this->assertEquals('Jardim Paulistano', $address->getNeighborhood());
    }

    public function testSetPostalCodeWorks()
    {
        $address = new Address();
        $address->setPostalCode('90210');

        $this->assertEquals('90210', $address->getPostalCode());
    }

    public function testSetCompletionWorks()
    {
        $address = new Address();
        $address->setCompletion('Sala 01');

        $this->assertEquals('Sala 01', $address->getCompletion());
    }

    public function testSetCityWorks()
    {
        $address = new Address();
        $address->setCity('Novo Hamburgo');

        $this->assertEquals('Novo Hamburgo', $address->getCity());
    }

    public function testSetStateWorks()
    {
        $address = new Address();
        $address->setState('RS');

        $this->assertEquals('RS', $address->getState());
    }
}