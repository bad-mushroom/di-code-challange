<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class StoreContactTest extends TestCase
{
    use DatabaseTransactions;

    public function testAcceptPostForContact()
    {
        $body = [
            'fullname' => 'Gwen Stafani',
            'email'    => 'gwen@nodoubt.com',
            'message'  => 'hi'
        ];

        $this->post('/api/contacts', $body);

        $this->assertResponseStatus(201);
    }
}
