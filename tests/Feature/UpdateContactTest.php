<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Contato;
use App\Http\Controllers\api\ContatoControllerFake;

class UpdateContactTest extends TestCase
{
    public function testUpdateContact() {
        $contact = new Contato();
        $controller = new ContatoControllerFake();

        $contact->name = 'Fulano da Silva';
        $contact->telefone = '21123456789';
        $contact->email = 'fulanosilva@gmail.com';

        $responseCreate = $controller->store($contact);

        // Preechendo novos dados
        $responseCreate->name = 'Ciclano da Silva';
        $responseCreate->telefone = '21999999999';
        $responseCreate->email = 'ciclanosilva@gmail.com';

        $responseUpdate = $controller->update($responseCreate);

        $this->assertJson(json_encode([
            $responseUpdate->id = 1,
            $responseUpdate->name => 'Ciclano da Silva',
            $responseUpdate->telefone => '21999999999',
            $responseUpdate->email => 'ciclanosilva@gmail.com'
        ]));
    }

    public function testUpdateNonExistentContact() {
        $contact = new Contato();
        $controller = new ContatoControllerFake();

        $contact->name = 'Fulano da Silva';
        $contact->telefone = '21123456789';
        $contact->email = 'fulanosilva@gmail.com';

        $responseCreate = $controller->store($contact);

        // Preechendo novos dados
        $responseCreate->id = 2;
        $responseCreate->name = 'Ciclano da Silva';
        $responseCreate->telefone = '21999999999';
        $responseCreate->email = 'ciclanosilva@gmail.com';

        $responseUpdate = $controller->update($responseCreate);

        $this->assertFalse($responseUpdate);

    }
}
