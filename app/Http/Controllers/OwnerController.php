<?php

namespace App\Http\Controllers;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

    public function store(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all(); 
        $user = $this->createOwner($data);
        // dd( $check);
        Auth::loginUsingId($user->id);
        return redirect()->intended('index')
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
