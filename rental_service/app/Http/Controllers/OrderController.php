<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::paginate(20);
        $total = Order::all()->count();
        return view('order.index', compact('orders', 'total'));
    }

    public function busca(Request $request){
        $criterio = $request->criterio;
        $total = Order::all()->count();
        $orders = Order::where('name', 'LIKE', '%' . $criterio . '%')->paginate(2);
        return view('order.index', compact('orders', 'total', 'criterio'));
    }

    public function addOrder()
    {
        $customers = Customer::all();
        return view('order.add', compact('customers'));
    }

    public function show($id){
        $order = Order::findOrFail($id);
        $items = OrderItem::with('product')->where('order_id',$order->id)->get();
        $payments = Payment::where('order_id', $order->id)->get();

        return view('order.list-item', compact('order','items', 'payments'));
    }

    public function edit($id){
        $customers = Customer::all();
        $order = Order::findOrFail($id);
        return view('order.edita', compact('order','customers'));
    }

    public function store(Request $request){
        $data = $request->all();
        $user = Order::create($data);

        return redirect()->route('order.index')->with('message', 'Order saved!');
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $order = Order::find($id)->update($data);

        return redirect()->route('order.index')->with('message', 'Order updated!');
    }

    public function destroy($id){
        $order = Order::findOrFail($id)->delete();
        return redirect()->route('order.index')->with('message', 'Order deleted!');
    }

    //Items
    public function addOrderItem($order_id)
    {
        $products = Product::all();
        return view('order.add-order-item', compact('products','order_id'));
    }

    public function editOrderItem($id)
    {
        $products = Product::all();
        $item = OrderItem::findOrFail($id);
        return view('order.edit-order-item', compact('item','products'));
    }

    public function updateOrderItem(Request $request, $id)
    {
        $data = $request->all();
        $order = OrderItem::find($id)->update($data);

        return redirect()->route('order.show', $request->get('order_id'))->with('message', 'Order Item Updated!');

    }

    public function storeOrderItem(Request $request){
        $data = $request->all();
        $user = OrderItem::create($data);

        return redirect()->route('order.show', $request->get('order_id'))->with('message', 'Order Item saved!');
    }

    //PAYMENTS
    public function addOrderPayment($order_id)
    {
        return view('order.add-order-payment', compact('order_id'));
    }

    public function storeOrderPayment(Request $request){
        $data = $request->all();
        $user = Payment::create($data);

        return redirect()->route('order.show', $request->get('order_id'))->with('message', 'Order Item saved!');
    }
}
