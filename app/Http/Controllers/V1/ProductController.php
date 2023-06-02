<?php

namespace App\Http\Controllers\V1;

use App\Models\V1\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::get();

        if ($products->isEmpty()) {
            return response()->json([], 204);
        }

        return response()->json($products, 200);
    }

    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'name'  => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $file = $request->file('image');
        $name = $file->getBasename() . '.' . $file->getClientOriginalExtension();
        $file->move('upload/', $name);

        $product        = new Product;
        $product->name  = $request->name;
        $product->price = $request->price;
        $product->image =  URL::asset('upload/' . $name);
        $product->save();

        return response()->json(['message' => 'Registro salvo com sucesso'], 201);
    }

    public function show(int $id): JsonResponse
    {
        return response()->json(Product::findOrFail($id));
    }

    public function update(Request $request, $id): JsonResponse
    {
        $this->validate($request, [
            'price' => 'numeric',
            'image' => 'image|mimes:png,jpg,jpeg'
        ]);
        $product        = Product::findOrFail($id);
        $product->name  = $request->name;
        $product->price = $request->price;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getBasename() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/', $name);
            $product->image = URL::asset('upload/' . $name);
        }
        $product->save();

        return response()->json(['message' => 'Registro atualizado com sucesso'], 200);
    }

    public function destroy(int $id): JsonResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Registro excluído com sucesso'], 200);
    }
}
