<?php

class EventTest extends ApiTestCase
{
    /**
     * @test
     */
    public function itFetchesWaitingEvents()
    {
        $this->hit('events');
        $this->assertResponseOk();
    }

    /**
     * @test
     */
    public function itFetchesLiveEvents()
    {
        $this->hit('live_events');
        $this->assertResponseOk();
    }

    /**
     * @test
     */
    public function itFetchesASpecificEvent()
    {
        $this->hit('events/1');
        $this->assertResponseOk();

    }
    
    /**
     * @test
     */
    public function itReturnA404IfTheEventDoesNotExist()
    {
        $this->hit('events/100');
        $this->assertResponseStatus(404);
    }
}