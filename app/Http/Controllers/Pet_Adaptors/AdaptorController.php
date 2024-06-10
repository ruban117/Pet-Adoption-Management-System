<?php

namespace App\Http\Controllers\Pet_Adaptors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Adaptor;
use App\Models\Pet;
use Mail;
use App\Mail\OTPEmail;
use App\Mail\AdoptionRequestEmail;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Donor;

class AdaptorController extends Controller
{
    public function index(){
        return view('Pet-Adaptor.login');
    }

    public function AdaptorSignup(){
        return view('Pet-Adaptor.Signup');
    }

    public function myprofile(){
        return view('Pet-Adaptor.My-Profile');
    }
    
    public function dashboard(){
        return view('Pet-Adaptor.Dashboard');
    }

    public function editprofile(){
        return view('Pet-Adaptor.Edit-Profile');
    }

    public function Logout(){
        Auth::guard('adaptor')->logout();
        return redirect()->route('adaptor-login');
    }

    public function ChangePasswordView(){
        return view('Pet-Adaptor.Change-Password');
    }

    public function registeradaptor(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:adaptors,email',
            'state' => 'required',
            'pin' => 'required',
            'password'=>'required',
            'number'=>'required|digits:10',
            'confpassword'=>'required|same:password'
        ]);

        $path = "Images/Avatar.jpg";
        
        $otp = rand(100000, 999999);

        $a = new Adaptor();
        $a->full_name = $req->name;
        $a->email = $req->email;
        $a->state = $req->state;
        $a->pin_code = $req->pin;
        $a->image=$path;
        $a->mobile_no=$req->number;
        $a->otp = $otp;
        $a->password = Hash::make($req->password);
        // Store the OTP in the adopter model
        $a->save(); // Save the adopter to the database
        
        Session::put('adaptor_id', $a->id); // Store the adopter's ID in the session

        Mail::to($req->email)->send(new OTPEmail($otp));

        return redirect()->route('otp-validate')->with('success', 'OTP Is Sent To Your Email');
    }

    public function validateOTP()
    {
        if (!Session::has('adaptor_id')) {
            return redirect()->route('adaptor-signup');
        } else {
            return view('OTP');
        }
    }

    public function verifyOTP(Request $req){
        $req->validate([
            'otp' => 'required|numeric' // Add validation for OTP field
        ]);

        $otp = $req->otp;
        $adaptor = Adaptor::find(Session::get('adaptor_id'));
        
        if($adaptor && $otp == $adaptor->OTP){
            // Correct OTP
            // Clear session
            return redirect()->route('adaptor-login')->with("success","User Created Successfully"); // Redirect to success page
        } else {
            // Incorrect OTP
            return redirect()->route('otp-validate')->with("error","Invalid OTP");
        }
    }

    public function ChangePassword(Request $req){
        $req->validate([
            'password' => 'required',
            'newpassword' => 'required',
            'cpassword'=>'required|same:newpassword'
        ]);
        

        if (Hash::check($req->password, Auth::guard('adaptor')->user()->password)) {
            DB::table('adaptors')
                ->where('id', Auth::guard('adaptor')->user()->id)
                ->update([
                    'password' => Hash::make($req->newpassword),
                ]); 
            return redirect()->route('adaptor-change-password-view')->with('success', "Password Changed Successfully");
        } else {
            return redirect()->route('adaptor-change-password-view')->with('error', "Password Is Not Matched");
        }

    }

    public function PetHealth(string $id){
        $adaptorId = Auth::guard('adaptor')->user()->id;
    
        $pets = DB::table('ownerships')
                ->select('adaptors.*', 'pets.*','ownerships.*')
                ->join('adaptors', 'ownerships.new_owner_id', '=', 'adaptors.id')
                ->join('pets', 'ownerships.pet_id', '=', 'pets.p_id')
                ->where('ownerships.new_owner_id', $adaptorId)
                ->where('pets.p_id', $id)
                ->get();
    
        return view('Pet-Adaptor.Submit_Pet_Health', ['pets' => $pets]);
    }

    public function SubmitPetHealth(Request $req,string $id){
        $req->validate([
            'image' => 'required',
            'certificate' => 'required',
        ]);
        $path=$req->file('image')->store('Images','public');
        $path2=$req->file('certificate')->store('Documents','public');
        DB::table('pethealths')
        ->insert([
            'pet_id'=>$id,
            'new_owner_id'=>Auth::guard('adaptor')->user()->id,
            'old_owner_id'=>$req->old_owner_id,
            'image'=>$path,
            'certificate'=>$path2,
            'content'=>$req->feelings,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        return redirect()->route('adaptor-pets')->with('success',"Pet Health Submitted Successfully");
    }

    

    


    public function adaptorauthenticate(Request $req){
        $validator = Validator::make($req->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        // Check if the adopter exists
    
        if($validator->passes()) {
            $d = Adaptor::where('email', $req->email)->first();
    
            if ($d && $d->is_block == 1){
                return redirect()->route('adaptor-login')->with('error', 'You Are Blocked Please Contact Us');
            }
            if($d && Auth::guard('adaptor')->attempt(['email' => $req->email, 'password' => $req->password], $req->get('remember'))){
                return redirect()->route('adaptor-dashboard');
            } else {
                return redirect()->route('adaptor-login')->with('error', 'Either Email/Password Is Incorrect');
            }
        }else{
            return redirect()->route('adaptor-login')->withErrors($validator)->withInput($req->only('email'));
        }
    }
    

    public function mypets(){
        $adaptorId = Auth::guard('adaptor')->user()->id;
    
        $pets = DB::table('ownerships')
                ->select('adaptors.*', 'pets.*')
                ->join('adaptors', 'ownerships.new_owner_id', '=', 'adaptors.id')
                ->join('pets', 'ownerships.pet_id', '=', 'pets.p_id')
                ->where('ownerships.new_owner_id', $adaptorId)
                ->paginate(2);
    
        return view('Pet-Adaptor.mypets', ['pets' => $pets]);
    }

    public function showadaptorpet(string $id){
        $pets = DB::table('pets')->where('p_id',$id)->get();
                
        return view('Pet-Adaptor.View-Pet', ['pets' => $pets]);
    }

    public function editprofileone(Request $req){
        $req->validate([
            'name' => 'required',
            'mobile' => 'required',
            'address'=>'required',
            'state'=>'required',
            'pin_code'=>'required'
        ]);

        DB::table('adaptors')
        ->where('id', Auth::guard('adaptor')->user()->id)
        ->update([
            'full_name'=>$req->name,
            'email'=>Auth::guard('adaptor')->user()->email,
            'mobile_no'=>$req->mobile,
            'address'=>$req->address,
            'state'=>$req->state,
            'pin_code'=>$req->pin_code,
        ]); 

        return redirect()->route('adaptor-editprofile-view')->with("success","Profile Updated Successfully");
    }

    public function editprofileimage(Request $req){
        $req->validate([
            'image' => 'required',
        ]);
        $path=$req->file('image')->store('Images','public');
        DB::table('adaptors')
        ->where('id', Auth::guard('adaptor')->user()->id)
        ->update([
            'image'=>$path
        ]);

        return redirect()->route('adaptor-editprofile-view')->with('success',"Image Updated Successfully");
    }

    public function avliablepets(){
        $pets=DB::table('pets')
        ->select('pets.*', 'donors.*')
        ->join('donors', 'pets.owner_id', '=', 'donors.id')
        ->paginate(6);
        return view('Pet-Adaptor.Avliable_Pets',['pets' => $pets]);
    }

    public function AvaliablePetsForDonation(Request $req){
        $req->validate([
            'pet_type' => 'nullable',
            'state' => 'nullable',
            'pin' => 'nullable',
        ]);
    
        if (!$req->pet_type && !$req->state && !$req->pin) {
            return redirect()->route('adaptor-avliablepets')->with(['error' => 'Please provide at least one search criteria.']);
        }
    
        $query = DB::table('pets')
            ->select('pets.*', 'donors.*')
            ->join('donors', 'pets.owner_id', '=', 'donors.id');
    
        if ($req->pet_type) {
            $query->where('pets.pet_type', $req->pet_type);
        }
    
        if ($req->state) {
            $query->where('donors.state', $req->state);
        }
    
        if ($req->pin) {
            $query->where('donors.pin_code', $req->pin);
        }
    
        $pets = $query->paginate(6);
    
        return view('Pet-Adaptor.Avliable_Pets', ['pets' => $pets]);
    }
    

    public function showpetdetails(string $id){
        $pets = DB::table('pets')
                ->select('pets.*', 'donors.*')
                ->join('donors', 'pets.owner_id', '=', 'donors.id')
                ->where('pets.p_id',$id)
                ->get();
                
        return view('Pet-Adaptor.Pet_Details', ['pets' => $pets]);
    }


    public function petquestions(string $id){
        $pets = DB::table('pets')
                    ->select('pets.*', 'donors.*')
                    ->join('donors', 'pets.owner_id', '=', 'donors.id')
                    ->where('p_id', $id)
                    ->get();
    
        return view('Pet-Adaptor.Questions', ['pets' => $pets]);
    }

    public function calculateScore(Request $request)
    {
        $answers = $request->except('_token');

        $score = 0;
        foreach ($answers as $answer) {
            if ($answer === "Great") {
                $score += 10;
            } elseif ($answer === "Good") {
                $score += 8;
            } elseif ($answer === "Not Bad") {
                $score += 6;
            } else {
                $score += 2;
            }
        }

        $pets = DB::table('requests')
                ->insert([
                    'pet_id'=>$request->pet_id,
                    'adaptor_id'=>Auth::guard('adaptor')->user()->id,
                    'donor_id'=>$request->donor_id,
                    'marks'=>$score
                ]);

        $d = Donor::where('id', $request->donor_id)->first();
        $p= Pet::where('p_id', $request->pet_id)->first();
        $d_name=$d->full_name;
        $p_name=$p->pet_name;
        $a_name=Auth::guard('adaptor')->user()->full_name;
        
        Mail::to($d->email)->send(new AdoptionRequestEmail($d_name,$a_name,$p_name));


        return redirect()->route('adaptor-avliablepets')->with('success',"Request Sent Successfully");

        
    }

    public function updateadaptorpet(string $id){
        $pets=DB::table('pets')
            ->where('p_id', $id)
            ->get();
        return view('Pet-Adaptor.Update-Pet',['pets'=>$pets]);
    }

    public function updateformpet(Request $req, $id){
        $req->validate([
            'name' => 'required',
            'pettype' => 'required',
            'breed' => 'required',
            'petage'=>'required',
            'petgender'=>'required',
            'petvaccination'=>'required',
            'petneutered'=>'required',
            'shotsuptodate'=>'required',
            'gooddogs'=>'required',
            'goodkids'=>'required',

        ]);
        $pets=DB::table('pets')
        ->where('p_id', $id)
        ->update([
            'pet_name'=>$req->name,
            'pet_type'=>$req->pettype,
            'pet_breed'=>$req->breed,
            'pet_age'=>$req->petage,
            'pet_gender'=>$req->petgender,
            'pet_vaccination'=>$req->petvaccination,
            'criteria_one'=>$req->petneutered,
            'criteria_two'=>$req->shotsuptodate,
            'criteria_three'=>$req->gooddogs,
            'criteria_four'=>$req->goodkids,
        ]); 
        return redirect()->route('update-adaptor-pet',$id)->with('success',"Pet Updated Successfully");
    }

    public function updatepetimage(Request $req, $id){
        $req->validate([
            'image' => 'required',
        ]);
        $path=$req->file('image')->store('Images','public');
        $pets=DB::table('pets')
        ->where('id', $id)
        ->update([
            'pet_image'=>$path
        ]);

        return redirect()->route('update-adaptor-pet',$id)->with('success',"Pet Image Updated Successfully");
    }

    public function updatepetcertificate(Request $req, $id){
        $req->validate([
            'cretificate_pdf'=>'required'
        ]);
        $pathpdf=$req->file('cretificate_pdf')->store('Documents','public');
        $pets=DB::table('pets')
        ->where('id', $id)
        ->update([
            'vaccination_certificate'=>$pathpdf
        ]);

        return redirect()->route('update-adaptor-pet',$id)->with('success',"Pet Vaccination Certificate Updated Successfully");
    }

    public function AdaptorHistory(){

        $pets=DB::table('requests')
                    ->select('pets.*', 
                    'requests.*',
                    'requests.id as request_id', 
                    'donors.full_name as donor_full_name',
                    'donors.mobile_no as donor_mobile',
                    'donors.email as donor_email')
                    ->join('pets', 'requests.pet_id', '=', 'pets.p_id')
                    ->join('adaptors', 'requests.adaptor_id', '=', 'adaptors.id')
                    ->join('donors', 'requests.donor_id', '=', 'donors.id')
                    ->where('adaptors.id', Auth::guard('adaptor')->user()->id)
                    ->paginate(2);
        return view('Pet-Adaptor.My-History',['pets'=>$pets]);
    }


    public function CheckEmail(Request $req) {
        $email = $req->email;
        $a = Adaptor::where('email', $email)->first();
    
        if ($a) {
            $otp = rand(100000, 999999);
            $req->session()->put('otp', $otp);
            $req->session()->put('email', $email);
    
            // Debugging output
    
            // Send OTP email
            Mail::to($email)->send(new OTPEmail($otp));
            
            return redirect()->route('adaptors.otp-forget');
        } else {
            // If admin doesn't exist, redirect back with error message
            return back()->with('error', 'Adaptor with this email does not exist.');
        }
    }

    public function VerifyPasswordOTP(Request $req){
        $storedOTP = $req->session()->get('otp');
        if($storedOTP == $req->otp){
            return redirect()->route('adaptor.password-reset-form');
        }else{
            return redirect()->route('adaptors.otp-forget')->with('error',"InValid Otp");
        }
    }

    public function ForgetPassword(Request $req){
        $req->validate([
            'newpassword' => 'required',
            'cpassword'=>'required|same:newpassword'
        ]);
        $email = $req->session()->get('email');

        $a = Adaptor::where('email', $email)->first();
    
        if ($a) {
            $a->password = Hash::make($req->newpassword);
            $a->save();
        }
        return redirect()->route('adaptor-login')->with('success', "Password Changed Successfully");
    }


    public function SubmitReport(Request $req){
        $req->validate([
            'report_content'=>'required'
        ]);

        DB::table('reports')
        ->insert([
            'reported_by'=>$req->reporter_name,
            'reporter_email'=>$req->reporter_email,
            'report_to'=>$req->name,
            'reportie_email'=>$req->email,
            'report_content'=>$req->report_content,
            'reported_person'=>$req->reported_person
        ]);

        return redirect()->route('Adaptor-History-view')->with('success',"Report Submitted Successfully");
    }
    

}
