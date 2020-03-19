<?php

namespace VCR\Event;

use VCR\Request;
use VCR\Storage;
use VCR\Cassette;
use VCR\Response;
use VCR\Configuration;

class AfterPlaybackEventTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var AfterPlaybackEvent
     */
    private $event;

    protected function setUp(): void
    {
        $this->event = new AfterPlaybackEvent(
            new Request('GET', 'http://example.com'),
            new Response(200),
            new Cassette('test', new Configuration(), new Storage\Blackhole())
        );
    }

    public function testGetRequest()
    {
        $this->assertInstanceOf('VCR\Request', $this->event->getRequest());
    }

    public function testGetResponse()
    {
        $this->assertInstanceOf('VCR\Response', $this->event->getResponse());
    }

    public function testGetCassette()
    {
        $this->assertInstanceOf('VCR\Cassette', $this->event->getCassette());
    }
}
