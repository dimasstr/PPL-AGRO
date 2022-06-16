<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\transactionType;
use DB;
Use Alert;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        $total1 = Transaction::where('jenisTransaksi_id', '=', 1)->get()->sum('nominal');
        $total2 = Transaction::where('jenisTransaksi_id', '=', 2)->get()->sum('nominal');
        $grand_total = $total1 - $total2;
        return view('dashboard.transaction.index', compact('grand_total'),[
            "title" => "Transaksi Toko",
            'transactions' => $transactions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $transactions = Transaction::all();
        $types = transactionType::All();
        return view('dashboard.transaction.create', compact('types'), [
            "title" => "Catat Transaksi",
            // 'transactions' => $transactions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Transaction $transaction)
    {   
        // return $request;
        $transaction = new Transaction([
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'nominal' => $request->nominal,
            'deskripsi' => $request->deskripsi,
            'jenisTransaksi_id' => $request->jenisTransaksi_id
        ]);

        $transaction->save();
    	// $transaction->jenisTransaksi_id = $request->jenisTransaksi_id;
        // $validatedData['id'] = auth()->user()->id;

        // Transaction::create($validatedData);
            // Transaction::create($request->all());
        return redirect('/transaksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction, $id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $types = transactionType::all();
        return view('dashboard.transaction.edit', [
            "title" => "Ubah Transaksi",
            'transaction' => $transaction,
            'types' => $types
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction, $id)
    {
        $validatedData = $request->validate([
            'tanggal_transaksi' => 'required',
            'nominal' => 'required',
            'deskripsi' => 'required',
            'jenisTransaksi_id' => 'required',
        ]);
        
        $transaction = Transaction::where('id', $id)->first();
    	$transaction->tanggal_transaksi = $request->tanggal_transaksi;
    	$transaction->nominal = $request->nominal;
    	$transaction->deskripsi = $request->deskripsi;
    	$transaction->jenisTransaksi_id = $request->jenisTransaksi_id;
    	$transaction->update();
        

        // return back()->with('validasi');

        alert()->success('Sukses!','Data transaksi berhasil diubah!');
        return redirect('/transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function graphic()
    {   
        $total1 = Transaction::select(DB::raw("CAST(SUM(nominal) as int) as total1"))
        ->where('jenisTransaksi_id', '=', 2)
        ->GroupBy(DB::raw('Month(tanggal_transaksi)'))
        ->pluck('total1');
        $total2 = Transaction::select(DB::raw("CAST(SUM(nominal) as int) as total2"))
        ->where('jenisTransaksi_id', '=', 1)
        ->GroupBy(DB::raw('Month(tanggal_transaksi)'))
        ->pluck('total2');
        // $total = Transaction::select(DB::raw("CAST(SUM(nominal) as int) as total"))
        // ->where($total2 - $total1)
        // ->GroupBy(DB::raw('Month(tanggal_transaksi)'))
        // ->pluck('total');

        // $bulan = Transaction::select(DB::raw("MONTHNAME(tanggal_transaksi) as bulan"))
        // ->GroupBy(DB::raw("MONTHNAME(tanggal_transaksi)"))
        // ->pluck('bulan');

        return view('dashboard.graph.index', compact('total'), [
            "title" => "Grafik Transaksi"
        ]);
    }
}
