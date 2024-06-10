<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\OTPEmail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class AdminLoginController extends Controller
{
    public function index(){
        return view('Admin.login');
    }


    public function CheckEmail(Request $req) {
        $email = $req->email;
        $admin = Admin::where('email', $email)->first();
    
        if ($admin) {
            $otp = rand(100000, 999999);
            $req->session()->put('otp', $otp);
            $req->session()->put('email', $email);
    
            // Debugging output
    
            // Send OTP email
            Mail::to($email)->send(new OTPEmail($otp));
            
            return redirect()->route('admin.otp-form');
        } else {
            // If admin doesn't exist, redirect back with error message
            return back()->with('error', 'Admin with this email does not exist.');
        }
    }
    

    public function VerifyOTP(Request $req){
        $storedOTP = $req->session()->get('otp');
        if($storedOTP == $req->otp){
            return redirect()->route('admin.password-reset-form');
        }else{
            return redirect()->route('admin.otp-form')->with('error',"InValid Otp");
        }
    }

    public function ForgetPassword(Request $req){
        $req->validate([
            'newpassword' => 'required',
            'cpassword'=>'required|same:newpassword'
        ]);
        $email = $req->session()->get('email');

        $admin = Admin::where('email', $email)->first();
    
        if ($admin) {
            $admin->password = Hash::make($req->newpassword);
            $admin->save();
        }
        return redirect()->route('admin.login')->with('success', "Password Changed Successfully");
    }

    public function authenticate(Request $req){
        $validator= Validator::make($req->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if($validator->passes() ){
            if(Auth::guard('admin')->attempt(['email'=>$req->email, 'password'=>$req->password], $req->get('remember'))){
                return redirect()->route('admin.home');
            }else{
                return redirect()->route('admin.login')->with('error','Either Email/Password Is Incorrect');
            }

        }else{
            return redirect()->route('admin.login')->withErrors($validator)->withInput($req->only('email'));
        }
    }
}
