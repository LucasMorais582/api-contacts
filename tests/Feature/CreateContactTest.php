<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Contato;
use App\Http\Controllers\api\ContatoControllerFake;


class CreateContactTest extends TestCase
{
    public function testCreateContact() {
        $contact = new Contato();
        $controller = new ContatoControllerFake();

        $contact->name = 'Fulano da Silva';
        $contact->telefone = '21123456789';
        $contact->email = 'fulanosilva@gmail.com';


        $response = $controller->store($contact);
        $this->assertJson(json_encode([
            $response->id => 1,
            $response->name => 'Fulano da Silva',
            $response->telefone => '21123456789',
            $response->email => 'fulanosilva@gmail.com'
        ]));
    }

    public function testCreateContactWithSameEmail() {
        $contact = new Contato();
        $controller = new ContatoControllerFake();

        $contact->name = 'Fulano da Silva';
        $contact->telefone = '21123456789';
        $contact->email = 'fulanosilva@gmail.com';

        $first_contact = $controller->store($contact);


        $this->assertFalse($controller->store($contact));
    }
}
