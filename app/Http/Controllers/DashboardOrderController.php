<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\orderDetail;
use App\Models\statusOrder;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status_id','!=',0)->get();

    	return view('dashboard.order.index', compact('orders'), [
            'title' => 'List Pesanan'
        ]);
    }

    public function orderDetail($id)
    {   
        $order = Order::where('id', $id)->first();
        $statuses = statusOrder::All();
        // $order_id = $order->id;
        $order_details = orderDetail::where('order_id', $order->id)->get();

        return view('dashboard.order.detail', compact('order', 'order_details', 'statuses'), [
            'title' => 'Pesanan Detail'
        ]);
    }

    public function updateStatus(Order $order, Request $request, $id)
    {   
        // return $request;
        $request->validate([
            'status_id' => 'required'
        ],
        [
            'status_id.required' => 'Status pesanan masih kosong!'
        ]);

        $order = Order::where('id', $id)->first();
    	$order->status_id = $request->status_id;
    	$order->update();

        alert()->success('Sukses!','Status pesanan telah diubah!');
        return redirect('/pesanan-customer');
    }

}