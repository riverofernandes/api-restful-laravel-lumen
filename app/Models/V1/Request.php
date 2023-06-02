<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'customer_id',
        'product_cod',
    ];

    protected $hidden = ['deleted_at'];

    public function products()
    {
        $productIds = json_decode($this->product_cod);

        $productCounts = array_count_values($productIds);

        $products = Product::whereIn('id', $productIds)->get();

        $products = $products->map(function ($product) use ($productCounts) {
            $count = $productCounts[$product->id] ?? 0;
            $product->qtd = $count;
            return $product;
        });

        return $products;
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
