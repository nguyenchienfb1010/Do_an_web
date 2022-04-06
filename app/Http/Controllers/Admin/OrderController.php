<?php

namespace App\Http\Controllers\Admin;

use App\Models\order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $title = 'List Order';
        $orders = order::all();
        return view('admin.order.index', compact('title', 'orders'));
    }
    public function delete($id)
    {
        order::find($id)->delete();
    }
    public function detail($id)
    {
        $title = 'Detail Order';
        $products = DB::table('orders')
            ->join('order_details', 'orders.id', '=', 'order_details.id_order')
            ->join('products', 'products.id', '=', 'order_details.id_product')
            ->select('orders.*', 'products.name','products.img','order_details.qty','order_details.price')
            ->get();
        return view('admin.order.detail', compact('title', 'products'));        
    }
    public function update(Request $request,$id){
        $order_update = order::find($id);
        $order_update->update([
            'status'=>$request->status
        ]);
        return redirect()->back();
    }
}
