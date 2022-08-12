<?php

namespace App\Models;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function viewAllForKs() {
        $products = DB::select("SELECT 
            allProducts.ctId as id,allProducts.name,allProducts.cost/100::double precision AS cost,
            sum(allProducts.quantity) AS quantity 
            FROM (SELECT categories.id as ctId,* FROM products INNER JOIN categories ON categories.id = products.category_id where categories.country_code = ?) AS allProducts 
            GROUP BY allProducts.name,allProducts.cost,allProducts.ctId;", ['KS']);

        return array_map(function($product) {
            $product->cost = number_format($product->cost, 2);
            return $product;
        }, $products);
    }

    public function viewAllForMk() {
        $products = DB::select("SELECT 
            allProducts.ctId as id,allProducts.name,allProducts.cost/100::double precision AS cost,
            sum(allProducts.quantity) AS quantity 
            FROM (SELECT categories.id as ctId,* FROM products INNER JOIN categories ON categories.id = products.category_id where categories.country_code = ?) AS allProducts 
            GROUP BY allProducts.name,allProducts.cost,allProducts.ctId;", ['MK']);

        return array_map(function($product) {
            $product->cost = number_format($product->cost, 2);
            return $product;
        }, $products);
    }
}
