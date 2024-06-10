<?php

namespace App\Http\Controllers\Pet_Donors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Donor;
use App\Models\Pet;
use App\Models\Adaptor;
use Mail;
use App\Mail\OTPEmail;
use App\Mail\AdoptionAcceptEmail;
use App\Mail\AdoptionRejectEmail;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class DonorController extends Controller
{


    public function index(){
        return view('Pet-Donors.login');
    }

    public function dashboard(){
        return view('Pet-Donors.Dashboard');
    }

    public function myprofile(){
        return view('Pet-Donors.My-Profile');
    }


    public function showpet(string $id){
        $pets = DB::table('pets')->where('p_id',$id)->get();
                
        return view('Pet-Donors.View-Pet', ['pets' => $pets]);
    }

    public function mypets(){
        $donorId = Auth::guard('donor')->user()->id;
    
        $pets = DB::table('pets')
                ->join('donors', 'pets.owner_id', '=', 'donors.id')
                ->where('donors.id', $donorId)
                ->select('pets.*') // Select all columns from 'pets' table
                ->paginate(2);
    
        return view('Pet-Donors.mypets', ['pets' => $pets]);
    }

    public function DonorSignup(){
        return view('Pet-Donors.Signup');
    }
    
    

    public function newpet(){
        return view('Pet-Donors.addnewpet');
    }

    public function editprofile(){
        return view('Pet-Donors.Edit-Profile');
    }


    public function ChangePasswordView(){
        return view('Pet-Donors.Change-Password');
    }

    public function ChangePassword(Request $req){
        $req->validate([
            'password' => 'required',
            'newpassword' => 'required',
            'cpassword'=>'required|same:newpassword'
        ]);
        

        if (Hash::check($req->password, Auth::guard('donor')->user()->password)) {
            $donors = DB::table('donors')
                ->where('id', Auth::guard('donor')->user()->id)
                ->update([
                    'password' => Hash::make($req->newpassword),
                ]); 
            return redirect()->route('change-password-view')->with('success', "Password Changed Successfully");
        } else {
            return redirect()->route('change-password-view')->with('error', "Password Is Not Matched");
        }

    }
    
    
    

    public function updatepet(string $id){
        $pets=DB::table('pets')
            ->where('p_id', $id)
            ->get();
        return view('Pet-Donors.Update-Pet',['pets'=>$pets]);
    }

    public function registerdonor(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:donors,email',
            'state' => 'required',
            'pin' => 'required',
            'number'=>'required|digits:10',
            'password'=>'required',
            'confpassword'=>'required|same:password'
        ]);

        $path = "Images/Avatar.jpg";
        
        $otp = rand(100000, 999999);

        $d = new Donor();
        $d->full_name = $req->name;
        $d->email = $req->email;
        $d->state = $req->state;
        $d->pin_code = $req->pin;
        $d->mobile_no=$req->number;
        $d->image=$path;
        $d->otp = $otp;
        $d->password = Hash::make($req->password);
         // Store the OTP in the donor model
        $d->save(); // Save the donor to the database
        
        Session::put('donor_id', $d->id); // Store the donor's ID in the session

        Mail::to($req->email)->send(new OTPEmail($otp));

        return redirect()->route('otp-validate-donor')->with('success', 'OTP Is Sent To Your Email');
    }


    public function donorauthenticate(Request $req){
        $validator = Validator::make($req->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        // Check if the donor exists
    
        if($validator->passes()) {
            $d = Donor::where('email', $req->email)->first();
    
            if ($d && $d->is_block == 1){
                return redirect()->route('donor-login')->with('error', 'You Are Blocked Please Contact Us');
            }
            if($d && Auth::guard('donor')->attempt(['email' => $req->email, 'password' => $req->password], $req->get('remember'))){
                return redirect()->route('donor-dashboard');
            } else {
                return redirect()->route('donor-login')->with('error', 'Either Email/Password Is Incorrect');
            }
        }else{
            return redirect()->route('donor-login')->withErrors($validator)->withInput($req->only('email'));
        }
    }
    
    

    public function validateOTP()
    {
        if (!Session::has('donor_id')) {
            return redirect()->route('donor-signup');
        } else {
            return view('Pet-Donors.Donor-OTP');
        }
    }

    public function verifyOTP(Request $req){
        $req->validate([
            'otp' => 'required|numeric' // Add validation for OTP field
        ]);

        $otp = $req->otp;
        $donor = Donor::find(Session::get('donor_id'));
        
        if($donor && $otp == $donor->OTP){
            // Correct OTP
            // Clear session
            return redirect()->route('donor-login')->with("success","User Created Successfully"); // Redirect to success page
        } else {
            // Incorrect OTP
            return redirect()->route('otp-validate-donor')->with("error","Invalid OTP");
        }
    }

    public function Logout(){
        Auth::guard('donor')->logout();
        return redirect()->route('donor-login');
    }

    public function AddPet(Request $req){

        $req->validate([
            'image' => 'required',
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
            'donationreason'=>'required',
            'donatepet'=>'required',

        ]);
        $path=$req->file('image')->store('Images','public');
        $pathpdf=$req->file('cretificate_pdf')->store('Documents','public');
        $pet=new Pet();
        $pet->owner_id=Auth::guard('donor')->user()->id;
        $pet->pet_image=$path;
        $pet->pet_name=$req->name;
        $pet->pet_type=$req->pettype;
        $pet->pet_breed=$req->breed;
        $pet->pet_age=$req->petage;
        $pet->pet_gender=$req->petgender;
        $pet->pet_vaccination=$req->petvaccination;
        $pet->criteria_one=$req->petneutered;
        $pet->criteria_two=$req->shotsuptodate;
        $pet->criteria_three=$req->gooddogs;
        $pet->criteria_four=$req->goodkids;
        $pet->donation_reason=$req->donationreason;
        $pet->donate_pet_or_not=$req->donatepet;
        $pet->vaccination_certificate=$pathpdf;


        $pet->save();

        return redirect()->route('donor-pets')->with('success',"Pet Added Successfully");

        
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
            'donationreason'=>'required',
            'donatepet'=>'required',

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
            'donation_reason'=>$req->donationreason,
            'donate_pet_or_not'=>$req->donatepet,
        ]); 
        return redirect()->route('update-pet',$id)->with('success',"Pet Updated Successfully");
    }

    public function editprofileone(Request $req){
        $req->validate([
            'name' => 'required',
            'mobile' => 'required',
            'address'=>'required',
            'state'=>'required',
            'pin_code'=>'required'
        ]);

        $donors=DB::table('donors')
        ->where('id', Auth::guard('donor')->user()->id)
        ->update([
            'full_name'=>$req->name,
            'email'=>Auth::guard('donor')->user()->email,
            'mobile_no'=>$req->mobile,
            'address'=>$req->address,
            'state'=>$req->state,
            'pin_code'=>$req->pin_code,
        ]); 

        return redirect()->route('editprofile-view')->with("success","Profile Updated Successfully");
    }

    public function updatepetimage(Request $req, $id){
        $req->validate([
            'image' => 'required',
        ]);
        $path=$req->file('image')->store('Images','public');
        $pets=DB::table('pets')
        ->where('p_id', $id)
        ->update([
            'pet_image'=>$path
        ]);

        return redirect()->route('update-pet',$id)->with('success',"Pet Image Updated Successfully");
    }

    public function editprofileimage(Request $req){
        $req->validate([
            'image' => 'required',
        ]);
        $path=$req->file('image')->store('Images','public');
        $pets=DB::table('donors')
        ->where('id', Auth::guard('donor')->user()->id)
        ->update([
            'image'=>$path
        ]);

        return redirect()->route('editprofile-view')->with('success',"Image Updated Successfully");
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

        return redirect()->route('update-pet',$id)->with('success',"Pet Vaccination Certificate Updated Successfully");
    }


    public function RequestView(){

        $pets=DB::table('requests')
                    ->select('pets.*', 
                    'requests.*',
                    'requests.id as request_id', 
                    'adaptors.full_name as adaptor_full_name',
                    'adaptors.mobile_no as adaptor_number',
                    'adaptors.id as adaptor_id',
                    'adaptors.email as adaptor_email',
                    'donors.*')
                    ->join('pets', 'requests.pet_id', '=', 'pets.p_id')
                    ->join('adaptors', 'requests.adaptor_id', '=', 'adaptors.id')
                    ->join('donors', 'requests.donor_id', '=', 'donors.id')
                    ->where('donors.id', Auth::guard('donor')->user()->id)
                    ->paginate(2);
        return view('Pet-Donors.Request_History',['pets'=>$pets]);
    }


    public function Accept(Request $req){

        if($req->stat == 1 ||  $req->stat == 2){
            return redirect()->route('Request-view')->with("error","Already Accepted You Cannot Re-Accept It");
        }
        DB::table('ownerships')
        ->insert([
            'old_owner_id'=>Auth::guard('donor')->user()->id,
            'new_owner_id'=>$req->adaptor_id,
            'pet_id'=>$req->pet_id,
        ]);

        DB::table('pets')
        ->where('p_id', $req->pet_id)
        ->update([
            'owner_id'=>0
        ]);

        DB::table('requests')
        ->where('id', $req->reque_id)
        ->update([
            'status'=>1
        ]);

        $a=Adaptor::where('id',$req->adaptor_id)->first();
        $p=Pet::where('p_id',$req->pet_id)->first();
        $a_email=$a->email;
        $a_name=$a->full_name;
        $p_name=$p->pet_name;
        Mail::to($a_email)->send(new AdoptionAcceptEmail($a_name,$p_name));

        return redirect()->route('Request-view')->with("success","Pet Ownership Changed Successfully");

    }


    public function Reject(Request $req){
        if($req->stat == 1 ||  $req->stat == 2){
            return redirect()->route('Request-view')->with("error","Already Rejected You Cannot Overwrite It");
        }

        DB::table('requests')
        ->where('id', $req->reque_id)
        ->update([
            'status'=>2
        ]);
        $a=Adaptor::where('email',$req->email)->first();
        $p=Pet::where('p_id',$req->pet_id)->first();
        $a_email=$a->email;
        $a_name=$a->full_name;
        $p_name=$p->pet_name;
        Mail::to($a_email)->send(new AdoptionRejectEmail($a_name,$p_name));

        return redirect()->route('Request-view')->with("success","Adaptor Rejected");
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

        return redirect()->route('Request-view')->with('success',"Report Submitted Successfully");
    }


    public function CheckEmail(Request $req) {
        $email = $req->email;
        $d = Donor::where('email', $email)->first();
    
        if ($d) {
            $otp = rand(100000, 999999);
            $req->session()->put('otp', $otp);
            $req->session()->put('email', $email);
    
            // Debugging output
    
            // Send OTP email
            Mail::to($email)->send(new OTPEmail($otp));
            
            return redirect()->route('donors.otp-forget');
        } else {
            // If admin doesn't exist, redirect back with error message
            return back()->with('error', 'Donor with this email does not exist.');
        }
    }

    public function VerifyPasswordOTP(Request $req){
        $storedOTP = $req->session()->get('otp');
        if($storedOTP == $req->otp){
            return redirect()->route('donor.password-reset-form');
        }else{
            return redirect()->route('donors.otp-forget')->with('error',"InValid Otp");
        }
    }

    public function ForgetPassword(Request $req){
        $req->validate([
            'newpassword' => 'required',
            'cpassword'=>'required|same:newpassword'
        ]);
        $email = $req->session()->get('email');

        $d = Donor::where('email', $email)->first();
    
        if ($d) {
            $d->password = Hash::make($req->newpassword);
            $d->save();
        }
        return redirect()->route('donor-login')->with('success', "Password Changed Successfully");
    }


    public function PetStatus(){
       $pets= DB::table('pethealths')
        ->select('pets.*', 
                    'donors.full_name as donor_name',
                    'adaptors.full_name as adaptor_name',
                    'pethealths.*',
                    'pethealths.image as pethealth_image',
                    'pethealths.certificate as pethealth_certificate')
                    ->join('donors', 'pethealths.old_owner_id', '=', 'donors.id')
                    ->join('adaptors', 'pethealths.new_owner_id', '=', 'adaptors.id')
                    ->join('pets', 'pethealths.pet_id', '=', 'pets.p_id')
                    ->where('pethealths.old_owner_id', Auth::guard('donor')->user()->id)
                    ->paginate(2);

        return view('Pet-Donors.My_Pets_Status',['pets'=>$pets]);

    }


}
