<?php namespace EscapeWork\Tray;

use Mockery as m;
use stdClass;

class TransactionTest extends TestCase
{

    public function test_set_token_transaction_works()
    {
        $transaction = new Transaction();
        $transaction->setTokenTransaction('A7S6DYE5DTE6D5E');

        $this->assertEquals('A7S6DYE5DTE6D5E', $transaction->getTokenTransaction());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function test_set_token_transaction_with_invalid_token_should_throw_an_exception()
    {
        $transaction = new Transaction();
        $transaction->setTokenTransaction('A7S6DYE5DTE6D5EA7S6DYE5DTE6D5EA7S6DYE5DTE6D5E');
    }

    public function test_set_order_number_works()
    {
        $transaction = new Transaction();
        $transaction->setOrderNumber('A7S6DYE5DTE6D5E');

        $this->assertEquals('A7S6DYE5DTE6D5E', $transaction->getOrderNumber());
    }

    public function test_set_free_works()
    {
        $transaction = new Transaction();
        $transaction->setFree('Lorem Ipsum');

        $this->assertEquals('Lorem Ipsum', $transaction->getFree());
    }

    public function test_set_transaction_id_works()
    {
        $transaction = new Transaction();
        $transaction->setTransactionId(12345);

        $this->assertEquals(12345, $transaction->getTransactionId());
    }

    public function test_set_status_name_works()
    {
        $transaction = new Transaction();
        $transaction->setStatusName('Cancelado');

        $this->assertEquals('Cancelado', $transaction->getStatusName());
    }

    public function test_set_status_id_works()
    {
        $transaction = new Transaction();
        $transaction->setStatusId(12345);

        $this->assertEquals(12345, $transaction->getStatusId());
    }

    /**
     * @testdox EscapeWork\Tray\Transaction::create
     */
    public function test_create_with_valid_response()
    {
        $xmlObject                                   = new stdClass;
        $xmlObject->message_response                 = new stdClass;
        $xmlObject->message_response->message        = 'success';
        $xmlObject->data_response                    = new stdClass;
        $xmlObject->data_response->token_transaction = 'addaw248sagd8';
        $xmlObject->data_response->url_car           = 'http://tray.go/cart';

        $request = m::mock('Request');
        $request->shouldReceive('send')->once()->withNoArgs()->andReturn($request);
        $request->shouldReceive('getBody')->once()->withNoArgs()->andReturn('some ugly XML');

        $httpClient = m::mock('HTTPClient');
        $httpClient->shouldReceive('post')->once()->andReturn($request);

        $transaction = m::mock('EscapeWork\Tray\Transaction[createClient,buildXML,setTokenTransaction,setUrl]');
        $transaction->shouldReceive('createClient')->once()->andReturn($httpClient);
        $transaction->shouldReceive('buildXML')->once()->with('some ugly XML')->andReturn($xmlObject);
        $transaction->shouldReceive('setTokenTransaction')->once()->with($xmlObject->data_response->token_transaction);
        $transaction->shouldReceive('setUrl')->once()->with($xmlObject->data_response->url_car);
        $transaction->create();
    }

    /**
     * @testdox EscapeWork\Tray\Transaction::create
     * @expectedException EscapeWork\Tray\TrayException
     */
    public function test_create_with_invalid_response()
    {
        $xmlObject                                   = new stdClass;
        $xmlObject->message_response                 = new stdClass;
        $xmlObject->message_response->message        = 'failed!!';

        $request = m::mock('Request');
        $request->shouldReceive('send')->once()->withNoArgs()->andReturn($request);
        $request->shouldReceive('getBody')->once()->withNoArgs()->andReturn('some ugly XML');

        $httpClient = m::mock('HTTPClient');
        $httpClient->shouldReceive('post')->once()->andReturn($request);

        $transaction = m::mock('EscapeWork\Tray\Transaction[createClient,buildXML,setTokenTransaction,setUrl]');
        $transaction->shouldReceive('createClient')->once()->andReturn($httpClient);
        $transaction->shouldReceive('buildXML')->once()->with('some ugly XML')->andReturn($xmlObject);
        $transaction->shouldReceive('setTokenTransaction')->never();
        $transaction->shouldReceive('setUrl')->never();
        $transaction->create();
    }

    /**
     * @testdox EscapeWork\Tray\Transaction::notification
     */
    public function test_notification_with_valid_response()
    {
        $xmlObject                            = new stdClass;
        $xmlObject->message_response          = new stdClass;
        $xmlObject->message_response->message = 'success';

        $request = m::mock('Request');
        $request->shouldReceive('send')->once()->withNoArgs()->andReturn($request);
        $request->shouldReceive('getBody')->once()->withNoArgs()->andReturn('some ugly XML');

        $httpClient = m::mock('HTTPClient');
        $httpClient->shouldReceive('post')->once()->andReturn($request);

        $transaction = m::mock('EscapeWork\Tray\Transaction[createClient,buildXML,setDataFromObject]');
        $transaction->shouldReceive('createClient')->once()->andReturn($httpClient);
        $transaction->shouldReceive('buildXML')->once()->with('some ugly XML')->andReturn($xmlObject);
        $transaction->shouldReceive('setDataFromObject')->once()->with($xmlObject);
        $transaction->notification();
    }

    /**
     * @testdox EscapeWork\Tray\Transaction::notification
     * @expectedException EscapeWork\Tray\TrayException
     */
    public function test_notification_with_invalid_response()
    {
        $xmlObject                            = new stdClass;
        $xmlObject->message_response          = new stdClass;
        $xmlObject->message_response->message = 'failure';

        $request = m::mock('Request');
        $request->shouldReceive('send')->once()->withNoArgs()->andReturn($request);
        $request->shouldReceive('getBody')->once()->withNoArgs()->andReturn('some ugly XML');

        $httpClient = m::mock('HTTPClient');
        $httpClient->shouldReceive('post')->once()->andReturn($request);

        $transaction = m::mock('EscapeWork\Tray\Transaction[createClient,buildXML,setDataFromObject]');
        $transaction->shouldReceive('createClient')->once()->andReturn($httpClient);
        $transaction->shouldReceive('buildXML')->once()->with('some ugly XML')->andReturn($xmlObject);
        $transaction->shouldReceive('setDataFromObject')->never();
        $transaction->notification();
    }
}