<?php

namespace App\Http\Controllers;
use App\Models\Lapangan;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function user()
    {
        $lapangans = Lapangan::get();
        return view('tampilan_user.user',compact('lapangans'));
    }
    public function index()
    {
        return view('auth.login');
    }
    public function profileadmin()
    {
        return view('profile.profile_admin');
    }
    
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role->name =="user"){
                return redirect()->intended('/')
                ->withSuccess('Signed in');
                
            } else {
                return redirect()->intended('dashboard')
                ->withSuccess('Signed in');
            }
         }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }
    
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'nomor_tlp' => $data['nomer_tlp'],
        'role_id' => $data['role_id'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
      
        $user->update($request->all());
      
        return redirect()->intended('dashboard')
                        ->with('success','updated successfully');
    }
    public function registration()
    {
        return view('auth.registration');
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
        return redirect("/")->withSuccess('You have signed-in');
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('dsb.dashboard_admin');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}

