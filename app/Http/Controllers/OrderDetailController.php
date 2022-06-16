<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\orderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderDetailController extends Controller
{   
    public function listOrder()
    {
        $orders = Order::where('user_id', Auth::User()->id)->where('status_id','!=',0)->get();
        // $order = Order::where('id', $orders->id)->first();
        // $status = statusOrder::where('id', $orders->status_id)->first();

    	return view('pesanan.list', compact('orders'), [
            'title' => 'List Pesanan'
        ]);
    }
    
    public function orderDetail($id)
    {   
        $order = Order::where('id', $id)->first();
        // $order_id = $order->id;
        $order_details = orderDetail::where('order_id', $order->id)->get();

        return view('pesanan.detail', compact('order', 'order_details'), [
            'title' => 'Pesanan Detail'
        ]);
    }

    public function updateStatus(Order $order, Request $request, $id)
    {   
        // return $request;
        // $status = statusOrder::where('id', $id)->first();
        $order = Order::where('user_id', Auth::user()->id)->where('status_id', 3)->first();
        if($order->status_id == 3)
        {
            $order_id = $order->id;
            $order->status_id = 4;
            $order->update();
        }

        // $order = Order::where('id', $id)->first();
    	// $order->status_id = $request->status_id;
    	// $order->update();

        alert()->success('Sukses!','Status pesanan telah diubah!');
        return redirect('/pesanan');
    }
}
