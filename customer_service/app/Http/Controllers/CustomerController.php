<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::paginate(20);
        $total = Customer::all()->count();
        return view('customer.index', compact('customers', 'total'));
    }

    public function busca(Request $request){
        $criterio = $request->criterio;
        $total = Customer::all()->count();
        $customers = Customer::where('name', 'LIKE', '%' . $criterio . '%')->paginate(2);
        return view('customer.index', compact('customers', 'total', 'criterio'));
    }

    public function show($id){
        $customer = Customer::findOrFail($id);
        return view('customer.list-item', compact('customer'));
    }

    public function edit($id){
        $customer = Customer::findOrFail($id);
        return view('customer.edita', compact('customer'));
    }

    public function store(Request $request){
        $data = $request->all();
        $user = Customer::create($data);

        return redirect()->route('customer.index')->with('message', 'Customer saved!');
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $customer = Customer::find($id)->update($data);

        return redirect()->route('customer.index')->with('message', 'Customer updated!');
    }

    public function destroy($id){
        $customer = Customer::findOrFail($id)->delete();
        return redirect()->route('customer.index')->with('message', 'Customer deleted!');
    }
}
