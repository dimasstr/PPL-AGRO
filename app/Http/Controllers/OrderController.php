<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\orderDetail;
use App\Models\statusOrder;
use App\Models\Transaction;
use App\Models\transactionType;
Use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }

    return $random_string;
}

class OrderController extends Controller
{
    public function index($id)
    {   
        $product = Product::where('id', $id)->first();

        return view('pesanan.index', compact('product'), [
            'title' => 'Pesanan'
        ]);
    }

    public function payment(Order $order, Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'image|file|max:2048',
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('payment');
        }

        // $order = Order::where('id', $id)->first();
        // $status = statusOrder::where('id', $id)->first();
        
        $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['tanggal'] = Carbon::now();
        // $validatedData['status_id'] = $order->statusOrder->status;
        $order = Order::find($id)->update($validatedData);

        alert()->success('Sukses!', 'Bukti Transfer telah terupload');
        return redirect('/pesanan-detail/'.$id);
    }

    public function order(Request $request, $id)
    {   
        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $product = Product::where('id', $id)->first();
        $status = statusOrder::where('id', $id)->first();
        $tanggal = Carbon::now();

        if($request-> jumlah_pesan > $product->stock)
    	{   
            //sweet alert
            toast('Jumlah pesanan melebihi stok yang tersedia!','warning')->width('25rem');
    		return redirect('pesanan/'.$id);
    	}

        $check_order = Order::where('user_id', Auth::User()->id)->where('status_id', 0)->first();

        if(empty($check_order))
        {
            $order = new Order;
            $order->user_id = Auth::User()->id;
            $order->tanggal = $tanggal;
            $order->status_id = 0;
            $order->no_resi = generate_string($permitted_chars, 15);
            $order->jumlah_harga = 0;
            $order->save();

            $transaction = new Transaction;
            $transaction->tanggal_transaksi = $tanggal;
            $transaction->nominal =  $product->price*$request->jumlah_pesan;
            $transaction->deskripsi = $order->id;
            $transaction->order_id = $order->id;
            $transaction->save();
        }

        $new_order = Order::where('user_id', Auth::user()->id)->where('status_id',0)->first();

        $check_order_detail = orderDetail::where('product_id', $product->id)-> where('order_id', $new_order->id)->first();
        
        if(empty($check_order_detail))
        {
            $order_detail = new orderDetail;
            $order_detail->product_id = $product->id;
            $order_detail->order_id = $new_order->id;
            $order_detail->jumlah = $request->jumlah_pesan;
            $order_detail->jumlah_harga = $product->price*$request->jumlah_pesan;
            $order_detail->ongkir = 10000;
            $order_detail->save();
        } else
        {
            $order_detail = orderDetail::where('product_id', $product->id)-> where('order_id', $new_order->id)->first();
            $order_detail->jumlah = $order_detail->jumlah+$request->jumlah_pesan;
            $new_price = $product->price*$request->jumlah_pesan;
            $order_detail->jumlah_harga = $order_detail->jumlah_harga+$new_price;
            $order_detail->update();
        }

        $order = Order::where('user_id', Auth::user()->id)->where('status_id',0)->first();
    	$order->jumlah_harga = $order->jumlah_harga+$product->price*$request->jumlah_pesan;
    	$order->update();
        
        $transaction = Transaction::where('jenisTransaksi_id',1)->first();
    	$transaction->nominal = $transaction->nominal+$product->price*$request->jumlah_pesan;
    	$transaction->update();

        alert()->success('Sukses!','Produk telah ditambahkan ke keranjang!');
        return redirect('/');
    }

    public function cart()
    {   
        $order = Order::where('user_id', Auth::user()->id)->where('status_id',0)->first();
        $order_details = [];
        if(!empty($order))
        {
        $order_details = orderDetail::where('order_id', $order->id)->get();
        }
        return view('pesanan.keranjang', compact('order', 'order_details'), [
            'title' => 'Keranjang'
        ]);
    }

    public function delete($id)
    {
        $order_detail = orderDetail::where('id', $id)->first();

        $order = Order::where('id', $order_detail->order_id)->first();
        $order->jumlah_harga = $order->jumlah_harga-$order_detail->jumlah_harga;
        $order->update();

        $order_detail->delete();

        alert()->success('Sukses!','Pesanan berhasil terhapus');
        return redirect('/');
    }
    
    public function checkout($id)
    {
        $status = statusOrder::where('id', $id)->first();
        $order = Order::where('user_id', Auth::user()->id)->where('id', $id)->first();
        if(!empty($order->status_id == 0))
        {
            $order_id = $order->id;
            $order->status_id = 1;
            $order->update();
        }
        
        $order_details = orderDetail::where('order_id', $order_id)->get();
        
        foreach ($order_details as $order_detail) {
            $product = Product::where('id', $order_detail->product_id)->first();
            $product->stock = $product->stock-$order_detail->jumlah;
            $product->update();
        }
        
        alert()->success('Sukses!','Checkout Berhasil');
        return view('pesanan.checkout', compact('order', 'order_details', 'status'), [
            'title' => 'Checkout'
        ]);
    }
}