<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;

class OrderController extends Controller
{
    /**
     * Create a new BusinessController instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function getAllOrders(Request $request)
    {
        $startDate = date("Y-m-d", strtotime($request->input('startDate')));
        $endDate = date("Y-m-d", strtotime($request->input('endDate')));

        $order = DB::table('orders')
                    ->join('businesses', 'orders.business_id', '=', 'businesses.id')
                    ->join('users', 'users.id', '=', 'orders.client_id')
                    ->whereBetween("date", [$startDate, $endDate])
                    ->orderBy('date', 'asc')
                    ->select('orders.*', 'businesses.address', 'users.name as client_name')
                    ->get();
        return response()->json($order);
    }

    public function getClientOrders(Request $request, $clientId)
    {

        $startDate = date("Y-m-d", strtotime($request->input('startDate')));
        $endDate = date("Y-m-d", strtotime($request->input('endDate')));

        $order = DB::table('orders')
                    ->join('businesses', 'orders.business_id', '=', 'businesses.id')
                    ->select('orders.*', 'businesses.address')
                    ->where('orders.client_id', $clientId)
                    ->whereBetween("date", [$startDate, $endDate])
                    ->get();
        return response()->json($order);
    }

    public function show($id)
    {
        $order = Order::find($id);
        return response()->json($order);
    }

    public function store(Request $request)
    {

        $data = new Order;

        $now = date('Y-m-d'); //Fomat Date
        $now = $request->date;

        $data['client_id'] = $request->client_id;
        $data['business_id'] = $request->business_id;
        $data['time_range'] = $request->time_range;
        $data['total'] = $request->total;
        $data['status'] = $request->status;
        $data['date'] = $now;
        $data->save();

        return response()->json($data);
    }

    public function delete(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return 204;
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());

        return $order;
    }
}
