<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    // public function index($posts)
    // {
    //     return view("data_toko.index", [
            public function index()
            {
                $abouts = About::all();
                return view("data_toko.index", [
                    "title" => "Informasi Toko",
                    'abouts' => $abouts
               ]);
            }

            public function edit(About $about, $id)
            {
                $abouts = About::where('id', $id)->first();
                return view('dashboard.about.edit', [
                    'title' => 'Ubah Data',
                    'abouts' => $abouts,
                ]);
            }
    //         "store_name" => About::all(),
    //         "since" => About::all(),
    //         "owner" => About::all(),
    //         "email" => About::all(),
    //         "telephone" => About::all(),
    //         "address" => About::all(),
    //         "medsoc" => About::all(),
    //     ]);
    // }
}
