<?php

namespace App\Http\Controllers;
use Hash;
use Session;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Lapangan;
class OwnerController extends Controller
{
    public function index()
    {
        $user = User::where('role_id','LIKE',"2")->with('lapangan')->get();
        return view('owner.data_owner',compact('user'));
        // $role = Role::get();
        // $lapangan = Lapangan::get();
        // $user = User::where('role_id','LIKE',"2")->get();
        // return view('owner.data_owner',compact('user','role','lapangan'));
    }

    public function edit(User $user)
    {
        $lapangan = Lapangan::get();   
        return view('owner.edit_owner',compact('user','lapangan'));
    }

    public function update(Request $request, User $user)
    {
               
            $user->update([
                $user->lapangan_id => $request->id_lapangan_futsal
            ]);
        //   dd($user);
            return redirect()->route('owner.index',$user->lapangan_id)
                            ->with('success','Product updated successfully');    
            
    }

    public function create()
    {
        $lapangan = Lapangan::get(); 
        return view('owner.tambah_owner',compact('lapangan'));
    }

    public function store(Request $request , User $user)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',   
        ]);
        $data = $request->all();
        $user = $this->createOwner($data);        
        // Auth::loginUsingId($user->id);
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
        'lapangan_id' => $data['lapangan_id'], 
        'password' => Hash::make($data['password'])
      ]);
    }
}
