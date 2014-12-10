<?php  namespace KevBaldwyn\Tests\NewRelic\Status;

use \PHPUnit_Framework_TestCase;
use KevBaldwyn\NewRelic\Status\PingResult;

class PingResultTest extends PHPUnit_Framework_TestCase {

    public function testGetBadResult()
    {
        $badResult = new PingResult([
            ['status' => 200, 'result' => PingResult::STATUS_OK],
            ['status' => 200, 'result' => PingResult::STATUS_PROBLEM]
        ]);

        $this->assertSame(PingResult::STATUS_PROBLEM, $badResult->getResult());
    }

    public function testGetOKResult()
    {
        $badResult = new PingResult([
            ['status' => 200, 'result' => PingResult::STATUS_OK],
            ['status' => 200, 'result' => PingResult::STATUS_OK]
        ]);

        $this->assertSame(PingResult::STATUS_OK, $badResult->getResult());
    }

} 