<?php

namespace App\Http\Controllers;
use Hash;
use Session;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $role = Role::get();
        $user = User::where('role_id','LIKE',"2")->get();
        // dd($user);
        return view('owner.data_owner',compact('user','role'));
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
        return redirect()->intended('/owner')
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
