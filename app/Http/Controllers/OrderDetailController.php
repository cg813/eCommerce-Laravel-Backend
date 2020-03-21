<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\OrderDetail;
use App\Product;

class OrderDetailController extends Controller
{
    public function getOrderDetail($orderId)
    {
        $orderDetail = DB::table('order_details')
                    ->join('products', 'order_details.product_id', '=', 'products.id')
                    ->join('orders', 'order_details.order_id', '=', 'orders.id')
                    ->select('products.*', 'order_details.order_id', 'order_details.quantity as order_quantity')
                    ->where('order_details.order_id', $orderId)
                    ->get();

        return response()->json($orderDetail);
    }

    public function createOrderDetail(Request $request) {
        $order = OrderDetail::create($request->all());

        // reflect ordered quantity
        $product_id = $request->input('product_id');
        $req_quantity = $request->input('quantity');

        $product = Product::find($product_id);
        $new_quantity = $product->quantity - $req_quantity;
        $product->quantity = $new_quantity;
        $product->save();

        return response()->json($order);
    }
}
