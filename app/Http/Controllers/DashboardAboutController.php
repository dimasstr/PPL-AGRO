<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class DashboardAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $abouts = About::all();
        return view('dashboard.about.index', [
            "title" => "Informasi Toko",
            'abouts' => $abouts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.about.create', [
            'title' => 'Data Toko Baru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'store_name' => 'required|max:20',
            'since' => 'required|max:5',
            'owner' => 'required|max:50',
            'email' => 'required|max:50|email:dns',
            'email_owner' => 'required|max:50|email:dns',
            'telephone' => 'required',
            'address' => 'required',
            'medsoc' => 'required'
        ]);
        
        $validatedData['id'] = auth()->user()->id;
        
        About::create($validatedData);

        alert()->success('Sukses!','Data Toko berhasil ditambahkan!');
        return redirect('/tentang-kami');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $abouts, $id)
    {   
        $abouts = About::where('id', $id)->first();
        return view('dashboard.about.edit', [
            'title' => 'Ubah Data',
            'abouts' => $abouts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $abouts, $id)
    {
        $validatedData = $request->validate([
            'store_name' => 'required|max:20',
            'since' => 'required|max:5',
            'owner' => 'required|max:50',
            'email' => 'required|max:50|email:dns',
            'email_owner' => 'required|max:50|email:dns',
            'telephone' => 'required',
            'address' => 'required',
            'medsoc' => 'max:255'
        ]);
        
        $validatedData['id'] = auth()->user()->id;

        $abouts = About::find($id)->update($validatedData);

        // return back()->with('validasi');

        alert()->success('Sukses!','Data Toko berhasil diubah!');
        return redirect('/tentang-kami');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
