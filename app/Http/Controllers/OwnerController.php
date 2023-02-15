<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        return view('owner.data_owner');
    }

    public function create()
    {
        return view('owner.tambah_owner');
    }

    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all(); 
        $user = $this->create($data);
        // dd( $check);
        Auth::loginUsingId($user->id);
        return redirect()->intended('userLogin')
        ->withSuccess('You have signed-in');
    }


    public function createOwner(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'nomor_tlp' => $data['nomer_tlp'],
        'role_id' => $data['role_id'],
        'password' => Hash::make($data['password'])
      ]);
    }
}
