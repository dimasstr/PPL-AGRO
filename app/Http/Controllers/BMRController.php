<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BMRController extends Controller
{
    public function index()
    {
        return view("bmr.index", [
            "title" => "Hitung Kebutuhan Kalori",
       ]);
    }
}
