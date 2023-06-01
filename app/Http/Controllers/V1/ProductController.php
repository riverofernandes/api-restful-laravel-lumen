<?php

namespace App\Http\Controllers\V1;

use App\Models\V1\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $teste = DB::select("SELECT * FROM products");
        dd($teste);
     
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
