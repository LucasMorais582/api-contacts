<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Contato;
use App\Http\Controllers\api\ContatoControllerFake;

class DeleteContactTest extends TestCase
{
    public function testDeleteContact() {
        $contact = new Contato();
        $controller = new ContatoControllerFake();

        $contact->name = 'Fulano da Silva';
        $contact->telefone = '21123456789';
        $contact->email = 'fulanosilva@gmail.com';

        $responseCreate = $controller->store($contact);

        $this->assertTrue($controller->delete($responseCreate->id));
    }

    public function testDeleteNonExistentContact() {
        $contact = new Contato();
        $controller = new ContatoControllerFake();

        $contact->name = 'Fulano da Silva';
        $contact->telefone = '21123456789';
        $contact->email = 'fulanosilva@gmail.com';

        $responseCreate = $controller->store($contact);

        $this->assertFalse($controller->delete(2));
    }
}
