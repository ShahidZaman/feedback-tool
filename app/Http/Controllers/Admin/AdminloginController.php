<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Hash;

class AdminloginController extends Controller
{
    public function __construct()
    {
        
    }

    public function login(Request $request){
        return view('admin.login');
    }

    public function auth(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = Admin::where('email', $email)->first();
     
        if ($user && md5($password) == $user->password){
            session()->put('admin',  $user);
            session()->put("admin_email",  $user->email);
            session()->put("role", "admin");
            session()->put('logged_in', true);
            return redirect()->intended('admin');
        }
        return redirect()->back()->with('login_error', 'Invalid Credentials!');
        // return redirect("admin/signin")->withSuccess('Oppes! You have entered invalid credentials');
    }


    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('admin.signin');
    }

   

}