<?php

namespace App\Http\Controllers;
use App\Models\Lapangan;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Str;

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

    public function updateUser(Request $request, User $user)
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

        return redirect()->intended('profileuser')
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

    public function forgate(){

        return view('auth.lupa_password');

    }

    // public function submitforgate(Request $request )
    // {
    //     $request->validate([
    //         'email' => 'required|email|exists:users',
    //     ]);

    //     $token = Str::random(64);

    //     DB::table('password_resets')->insert([
    //         'email' => $request->email,
    //         'token' => $token,
    //         'created_at' => Carbon::now()
    //       ]);

    //     Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
    //         $message->to($request->email);
    //         $message->subject('Reset Password');
    //     });

    //     return back()->with('message', 'We have e-mailed your password reset link!');
    // }
    /**
       * Write code on Method
       *
       * @return response()
       */
    public function showForgetPasswordForm()
    {
        return view('auth.lupa_password');
    }
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function showResetPasswordForm($token) {
        return view('auth.ubah_password', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);


        $updatePassword = DB::table('password_resets')
                            ->where([
                            'email' => $request->email,
                            'token' => $request->token
                            ])
                            ->first();
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('/login')->withSuccess('Your password has been changed!');
    }
}

