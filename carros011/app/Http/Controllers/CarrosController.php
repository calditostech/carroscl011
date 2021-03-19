<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Carros;


class CarrosController extends Controller
{
    public function index()
    {
        $carros = Carros::all()->toArray();
        return array_reverse($carros);      
    }

    public function store(Request $request)
    {
        $carro = new Carros([
            'marca' => $request->input('marca'),
            'marca' => $request->input('modelo'),
            'marca' => $request->input('ano'),
            'marca' => $request->input('fabricacao'),
            'detail' => $request->input('placa')
        ]);
        $carro->save();

        return response()->json('Carro criado!');
    }

    public function show($id)
    {
        $carro = Carros::find($id);
        return response()->json($carro);
    }

    public function update($id, Request $request)
    {
        $carro = Carros::find($id);
        $carro->update($request->all());

        return response()->json('Carro Atualizado!');
    }

    public function destroy($id)
    {
        $carro = Carros::find($id);
        $carro->delete();

        return response()->json('Carro deletado!');
    }
}
