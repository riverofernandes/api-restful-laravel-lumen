<?php

namespace App\Http\Controllers\V1;

use Laravel\Lumen\Routing\Controller;

class RequestController extends Controller
{
    public function index()
    {
        $registros = Product::all();
        return view('nome-do-modelo.index', compact('registros'));
    }

    public function create()
    {
        return view('nome-do-modelo.create');
    }

    public function show($id)
    {
        $registro = Product::findOrFail($id);
        return view('nome-do-modelo.show', compact('registro'));
    }

    public function update(Request $request, $id)
    {
        // Valide e atualize os dados do formulário
    }

    public function destroy($id)
    {
        // Exclua o registro
    }
}
