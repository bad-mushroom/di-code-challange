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
            'message'  => 'hi',
        ];

        $response = $this->post('/api/contacts', $body);

        $response->assertResponseStatus(201);
        $response->assertJson(json_encode($body));
    }

    public function testAcceptPostForContactWithFieldValidation()
    {
        $body = [
            'fullname' => 'Gwen Stafani',
            'message'  => 'hi',
        ];

        $response = $this->post('/api/contacts', $body);

        $response->assertResponseStatus(422);
    }
}
