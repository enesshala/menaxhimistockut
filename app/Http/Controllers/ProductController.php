<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function allKsProducts() {
        $product = new \App\Models\Product;
        return $product->viewAllForKs();
    }

    public function allMkProducts() {
        $product = new \App\Models\Product;
        return $product->viewAllForMk();
    }

    public function addProduct(Request $request) {
        try {  
            $product = new \App\Models\Product;
            $product->category_id = $request->category;
            $product->quantity = $request->quantity;
            $product->save();
            
            return redirect()->back()->with('success','Product stored!');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Something went wrong!');
        }
    }
}
