<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class StoreContactTest extends TestCase
{
    use DatabaseTransactions;

    public function testAcceptPostForContact()
    {
        $this->post('/api/contacts');

        $this->assertResponseOk();
    }
}
