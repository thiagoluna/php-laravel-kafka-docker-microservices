<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(20);
        $total = Product::all()->count();
        return view('product.index', compact('products', 'total'));
    }

    public function busca(Request $request){
        $criterio = $request->criterio;
        $total = Product::all()->count();
        $products = Product::where('name', 'LIKE', '%' . $criterio . '%')->paginate(2);
        return view('product.index', compact('products', 'total', 'criterio'));
    }

    public function show($id){
        $product = Product::findOrFail($id);
        return view('product.list-item', compact('product'));
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        return view('product.edita', compact('product'));
    }

    public function store(Request $request){
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qtd_available = $request->qtd_available;
        $product->qtd_total = $request->qtd_total;
        $product->save();
        return redirect()->route('product.index')->with('message', 'Product saved!');
    }

    public function update(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qtd_available = $request->qtd_available;
        $product->qtd_total = $request->qtd_total;
        $product->save();
        return redirect()->route('product.index')->with('message', 'Product updated!');
    }

    public function destroy($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('message', 'Product deleted!');
    }
}
