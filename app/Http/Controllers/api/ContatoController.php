<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contato;

class ContatoController extends Controller
{
    public function status() {
        return ['status' => 'conected'];
    }

    public function list() {
        $contato = Contato::all();
        return $contato;
    }

    public function view($id) {
        $contato = Contato::find($id);
        return $contato;
    }

    public function create(Request $request){
        try {
            $contato = new Contato();

            $contato->name = $request->name;
            $contato->telefone = $request->telefone;
            $contato->email = $request->email;

            $contato->save();

            return ['contato' => $contato];

        } catch(\Exception $error) {
            return ['response' => 'Error', 'details' => $error];
        }
    }

    public function update(Request $request, $id){
        try {
            $contato = Contato::find($id);

            $contato->name = $request->name;
            $contato->telefone = $request->telefone;
            $contato->email = $request->email;

            $contato->save();

            return ['contato atualizado' => $contato];

        } catch(\Exception $error) {
            return ['response' => 'Error', 'details' => $error];
        }
    }

    public function delete($id){
        try {
            $contato = Contato::find($id);

            $contato->delete();

            return ['contato deletado'];

        } catch(\Exception $error) {
            return ['response' => 'Error', 'details' => $error];
        }
    }
}
