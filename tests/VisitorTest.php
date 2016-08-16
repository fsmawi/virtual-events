<?php

class VisitorTest extends ApiTestCase
{
    /**
     * @test
     */
    public function itSetNewVisitoOnASpecificStand()
    {
        $this->post_hit('stands/1/visitors', ['ip' => '0.0.0.0']);
        $this->assertResponseOk();

    }

    /**
     * @test
     */
    public function itSetNewVisitoOnNonExistingStand()
    {
        $this->post_hit('stands/102/visitors', ['ip' => '0.0.0.0']);
        $this->assertResponseStatus(404);
    }
}