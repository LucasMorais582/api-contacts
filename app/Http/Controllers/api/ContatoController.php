<?php

namespace App\Http\Controllers\api;

use App\Contato;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ContatoController extends Controller
{
    public function status() {
        return ['status' => 'conected'];
    }

    public function list() {
        $contact = Contato::all();
        return $contact;
    }

    public function show($id) {
        $contact = Contato::findOrFail($id);
        return $contact;
    }

    public function store(Request $request){
        try {

            $contact = Contato::create([
                'name' => $request->name,
                'telefone' => $request->telefone,
                'email' => $request->email,
            ]);

            return response()->json(['contact' => $contact], 201);

        } catch(\Exception $error) {
            return Response::json([
                'Response' => $error
            ], 400);
        }
    }

    public function update(Request $request, $id){
        try {
            $contact = Contato::findOrFail($id);

            $contact = Contato::update([
                'name' => $request->name,
                'telefone' => $request->telefone,
                'email' => $request->email,
            ]);

            return ['contact' => $contact];

        } catch(\Exception $error) {
            return Response::json([
                'Response' => $error
            ], 400);
        }
    }

    public function delete($id){
        try {
            $contact = Contato::findOrFail($id);
            $contact->delete();

            return ['contact deleted with success'];

        } catch(\Exception $error) {
            return ['response' => 'Error', 'details' => $error];
        }
    }
}
