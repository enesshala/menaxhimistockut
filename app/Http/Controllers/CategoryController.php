<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(Request $request) {
        try {
            $category = new \App\Models\Category;
            $category->name = $request->product_name;
            $category->cost = $request->cost * 100;
            $category->country_code = $request->country_code;
            $category->save();

            return redirect()->back()->with('success','Category stored!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Something went wrong!');
        }
    }
}
