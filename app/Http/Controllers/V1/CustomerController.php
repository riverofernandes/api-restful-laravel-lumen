<?php

namespace App\Http\Controllers\V1;

use App\Models\V1\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class CustomerController extends Controller
{
    public function index(): JsonResponse
    {
        $registros = Customer::all();

        if ($registros->isEmpty()) {
            return response()->json([], 204);
        }

        return response()->json($registros, 200);
    }

    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email:rfc,dns|unique:App\Models\V1\Customer,email',
            'phone'     => 'required|min:8',
            'birth'     => 'required|date',
            'address'   => 'required',
            'district'  => 'required',
            'zip'       => 'required|min:7',
        ]);

        $customer               = new Customer;
        $customer->name         = $request->name;
        $customer->email        = $request->email;
        $customer->phone        = $request->phone;
        $customer->birth        = $request->birth;
        $customer->address      = $request->address;
        $customer->complement   = $request->complement ?? null;
        $customer->district     = $request->district;
        $customer->zip          = $request->zip;

        $customer->save();

        return response()->json(['message' => 'Registro salvo com sucesso'], 201);
    }

    public function show($id)
    {
        return response()->json(Customer::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email'     => 'email:rfc,dns|unique:App\Models\V1\Customer,email,' . $id,
            'phone'     => 'min:8',
            'birth'     => 'date',
            'zip'       => 'min:7',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->all());

        return response()->json(['message' => 'Registro atualizado com sucesso'], 200);
    }

    public function destroy($id)
    {
        $product = Customer::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Registro excluído com sucesso'], 200);
    }
}
