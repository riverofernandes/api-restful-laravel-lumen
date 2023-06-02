<?php

namespace App\Http\Controllers\V1;

use App\Models\V1\Request as Solicitation;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class RequestController extends Controller
{
    public function index()
    {
        $solicitations = Solicitation::all();

        if ($solicitations->isEmpty()) {
            return response()->json([], 204);
        }
    
        $responseData = [];
    
        foreach ($solicitations as $solicitation) {
          
            $products = $solicitation->products();
    
            $responseData[] = [
                'id' => $solicitation->id,
                'customer' => $solicitation->customer,
                'products' => $products,
                'created_at' => $solicitation->created_at,
                'updated_at' => $solicitation->updated_at,
            ];
        }
    
        return response()->json($responseData, 200);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'customer_id'   => 'required|integer|exists:App\Models\V1\Customer,id',
            'product_cod'   => 'required|array',
        ]);

        $solicitation = new Solicitation;

        $solicitation->customer_id = $request->customer_id;
        $solicitation->product_cod = json_encode($request->product_cod);
        $solicitation->save();

        return response()->json(['message' => 'Registro salvo com sucesso'], 201);
    }

    public function show($id)
    {
        $request = Solicitation::findOrFail($id);
        $products = $request->products();
    
        $responseData = [
            'id' => $request->id,
            'customer_id' => $request->customer,
            'products' => $products,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ];
    
        return response()->json($responseData);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'customer_id'   => 'integer|exists:App\Models\V1\Customer,id',
            'product_cod'   => 'array',
        ]);

        $solicitacao = Solicitation::findOrFail($id);
        $solicitacao->update($request->all());

        return response()->json(['message' => 'Registro atualizado com sucesso'], 200);
    }

    public function destroy($id)
    {
        $solicitacao = Solicitation::findOrFail($id);
        $solicitacao->delete();
        return response()->json(['message' => 'Registro excluído com sucesso'], 200);
    }
}
