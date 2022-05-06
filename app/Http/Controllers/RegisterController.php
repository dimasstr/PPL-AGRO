<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index() 
    {
        return view ('register.index', [
            'title' => 'Registrasi'
        ]);
    }

    public function store(Request $request) 
    {
        // return request()->all();
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'address' => 'required|max:50',
            'telephone' => 'required|max:15',
            'email' => 'required|max:50|email:dns|unique:users',
            'password' => 'required|min:5|max:10',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registrasi Berhasil, Silahkan Sign-In');
    }
}