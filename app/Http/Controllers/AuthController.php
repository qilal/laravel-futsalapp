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
    public function user() //user belum login
    {
        $lapangans = Lapangan::get();
        return view('tampilan_user.user',compact('lapangans'));
    }
    public function userLogin() // user udah login
    {
        $lapangans = Lapangan::get();
        return view('tampilan_user.user_login',compact('lapangans'));
    }
    public function index()
    {
        return view('auth.login');
    }
    
    public function profileuser()
    {
        return view('tampilan_user.profile.profile_admin');
    }

    public function profileeditUser()
    {
        return view('tampilan_user.profile.profile_edit');
    }

    public function profileadmin()
    {
        return view('profile.profile_admin');
    }
    
    public function profileedit()
    {
        return view('profile.profile_edit');
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
                return redirect("userLogin")
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
            'nomor_tlp' => 'required',
        ]);
      
        $input =  $request->all();
        if ($image = $request->file('foto')) {
            $destinationPath = 'img/';  
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
        }else{
            unset($input['foto']);
        }
        $user->update($input);
      
        return redirect()->intended('profile')
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
        return redirect()->intended('userLogin')
        ->withSuccess('You have signed-in');
    }

    // public function dashboard()
    // {
    //     if(Auth::check()){
    //         return redirect()->intended('viewuser')
    //             ->withSuccess('Signed in');
    //         // return view('dsb.dashboard_admin');
    //     }
  
    //     return redirect("login")->withSuccess('You are not allowed to access');
    // }

    //   public function viewuser(){
    //     $lapangans = Lapangan::get();
    //     $hours = hours::get();
    //     $days = Days::get();
    //        return view('tabel',compact('hours','days','lapangans') );
    // }

    public function viewowner()
    {
        return view('owner.data_owner');
    }
  

    public function signOutUser() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}

