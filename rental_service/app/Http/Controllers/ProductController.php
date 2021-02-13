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
        $data = $request->all();
        $user = Product::create($data);

        return redirect()->route('product.index')->with('message', 'Product saved!');
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $customer = Product::find($id)->update($data);

        return redirect()->route('product.index')->with('message', 'Product updated!');
    }

    public function destroy($id){
        $customer = Product::findOrFail($id)->delete();

        return redirect()->route('product.index')->with('message', 'Product deleted!');
    }
}
