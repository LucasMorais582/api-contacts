<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Contato;

class ContatoController extends Controller
{
    public function status() {
        return ['status' => 'conected'];
    }

    public function list() {
        $contact = Contato::all();
        return $contact;
    }

    public function view($id) {

        $contact = Contato::find($id);
        if($contact == null) abort(404);

        return $contact;
    }

    public function create(Request $request){
        try {

            $contact = new Contato();

            $contact->name = $request->name;
            $contact->telefone = $request->telefone;
            $contact->email = $request->email;

            $contact->save();

            return response()->json(['contact' => $contact], 201);

        } catch(\Exception $error) {
            return Response::json([
                'Response' => $error
            ], 400);
        }
    }

    public function update(Request $request, $id){
        try {
            $contact = Contato::find($id);

            if($contact == null) abort(404);

            $contact->name = $request->name;
            $contact->telefone = $request->telefone;
            $contact->email = $request->email;

            $contact->save();

            return ['contact' => $contact];

        } catch(\Exception $error) {
            return Response::json([
                'Response' => $error
            ], 400);
        }
    }

    public function delete($id){
        try {
            $contact = Contato::find($id);

            if($contact == null) abort(404);

            $contact->delete();

            return ['contact deleted with success'];

        } catch(\Exception $error) {
            return ['response' => 'Error', 'details' => $error];
        }
    }
}
