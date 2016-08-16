<?php

class StandTest extends ApiTestCase
{
    /**
     * @test
     */
    public function itFetchesASpecificStand()
    {
        $this->hit('stands/1');
        $this->assertResponseOk();

    }

    /**
     * @test
     */
    public function itReturnA404IfTheStandDoesNotExist()
    {
        $this->hit('stands/100');
        $this->assertResponseStatus(404);
    }
}