<?php  namespace KevBaldwyn\Tests\NewRelic\Status; 

use \PHPUnit_Framework_TestCase;
use \Mockery as m;
use KevBaldwyn\NewRelic\Status\Pinger;
use KevBaldwyn\NewRelic\Status\PingResult;

class PingerTest extends PHPUnit_Framework_TestCase {

    public function testPingReturnsPingResult()
    {
        $pinger = new Pinger([], '');
        $this->assertInstanceOf('KevBaldwyn\NewRelic\Status\PingResult', $pinger->ping());
    }

    public function testMatchRegEx()
    {
        $pinger = new Pinger([], '');
        $regEx = '(response ok)';
        $this->assertSame(PingResult::STATUS_OK, $pinger->matchRegEx('<p>response ok</p>', $regEx));
        $this->assertSame(PingResult::STATUS_PROBLEM, $pinger->matchRegEx('<p>response not ok</p>', $regEx));
    }

    public function testInterrogateUrlsReturnsCorrectResult()
    {
        $urls = [
            '/url/ok' => '(good)',
            '/url/not-ok' => '(good)'
        ];
        $requestOk  = static::mockRequest(200, 'good');
        $requestBad = static::mockRequest(200, 'bad');

        $guzzle = m::mock('Guzzle\Http\ClientInterface');
        $guzzle->shouldReceive('get')->with('/url/ok')->once()->andReturn($requestOk);
        $guzzle->shouldReceive('get')->with('/url/not-ok')->once()->andReturn($requestBad);

        $pinger = new Pinger($urls, '', $guzzle);
        $res = $pinger->interrogateUrls();

        $this->assertSame([
            '/url/ok' => ['status' => 200, 'result' => PingResult::STATUS_OK],
            '/url/not-ok' => ['status' => 200, 'result' => PingResult::STATUS_PROBLEM]
        ], $res);
    }

    public function testResponseCodeOverridesRegEx()
    {
        $urls = [
            '/url/ok' => '(good)'
        ];
        $request = static::mockRequest(501, 'good');

        $guzzle = m::mock('Guzzle\Http\ClientInterface');
        $guzzle->shouldReceive('get')->with('/url/ok')->andReturn($request);

        $pinger = new Pinger($urls, '', $guzzle);
        $res = $pinger->interrogateUrls();

        $this->assertSame([
            '/url/ok' => ['status' => 501, 'result' => PingResult::STATUS_PROBLEM],
        ], $res);
    }


    static protected function mockRequest($status, $body)
    {
        $response = m::mock('Guzzle\Http\Message\Response');
        $response->shouldReceive('getStatusCode')->andReturn($status);
        $response->shouldReceive('getBody')->andReturn($body);
        $request = m::mock('Guzzle\Http\Message\RequestInterface');
        $request->shouldReceive('getResponse')->andReturn($response);

        return $request;
    }
} 