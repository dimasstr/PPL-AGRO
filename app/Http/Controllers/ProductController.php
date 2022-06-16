<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $products = Product::all();
        return view('dashboard.layouts.content', [
            'title' => 'Dashboard',
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.product.create', [
            'title' => 'Produk Baru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // return $request->file('image')->store('product-images');
        $validatedData = $request->validate([
            'image' => 'image|file|max:2048',
            'product_name' => 'required|max:50',
            'price' => 'required',
            'variant' => 'required|max:20|unique:products',
            'expired_date' => 'required',
            'stock' => 'required',
            'description' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('product-images');
        }
        
        $validatedData['id'] = auth()->user()->id;

        Product::create($validatedData);

        return redirect('/dashboard')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        $product = Product::where('id', $id)->first();
        return view('dashboard.product.edit', [
            'title' => 'Ubah Data',
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {   
        $rules = [
            'image' => 'required|image|file|max:2048',
            'product_name' => 'required|max:50',
            'price' => 'required',
            'expired_date' => 'required',
            'stock' => 'required',
            'variant' => 'required|max:20',
            'description' => 'required',
        ];

        // if($request->variant != $product->variant) {
        //     $rules['variant'] = 'required|max:20|unique:products';
        // }
        
        $validatedData = $request->validate($rules);

        $validatedData['id'] = auth()->user()->id;

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('product-images');
        }

        $product = Product::find($id)->update($validatedData);

        return redirect('/dashboard')->with('success', 'Produk berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/dashboard')->with('success', 'Data produk berhasil dihapus!');
    }
}