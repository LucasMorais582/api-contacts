<?php

namespace App\Http\Controllers\api;

use App\Contato;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ContatoControllerFake extends Controller
{
    private $id = 1;
    private $email;

    public function store($contact){

        if(empty($this->email))
            $this->email = $contact->email;

        else{
            if($this->email == $contact->email)
                return false;
        }

        if (gettype($contact->name) == 'string' &&
            gettype($contact->telefone) == 'string' &&
            gettype($contact->email) == 'string'){

            $contact->id = $this->id;
            return $contact;
        }

        else return false;
    }

    public function update($contact){

        if($this->id == $contact->id){

            if (gettype($contact->name) == 'string' &&
                gettype($contact->telefone) == 'string' &&
                gettype($contact->email) == 'string'){

                return $contact;
            }
        } else return false;
    }

    public function delete($id){
        if($this->id == $id) return true;

        else return false;
    }
}
