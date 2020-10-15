<?php

use App\Events\ContactAdded;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class StoreContactTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function testAcceptPostForContact()
    {
        $this->expectsEvents(ContactAdded::class);

        $body = [
            'fullname' => 'Gwen Stafani',
            'email'    => 'gwen@nodoubt.com',
            'message'  => 'hi',
            'phone'    => '123-321-9876',
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
