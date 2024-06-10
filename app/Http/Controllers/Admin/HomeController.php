<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\WarningEmail;
use App\Mail\BlockEmail;
use App\Mail\UnblockEmail;
use App\Mail\ReportSuccessEmail;
use App\Models\Donor;
use App\Models\Adaptor;


class HomeController extends Controller
{
    public function index() {
        return view('Admin.Dashboard');
    }

    public function Logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function PetDonors(){
        $donors=DB::table('donors')->paginate(4);
        return view('Admin.Pet-Donors', ['donors'=>$donors]);
    }

    public function PetAdaptors(){
        $adaptors=DB::table('adaptors')->paginate(4);
        return view('Admin.Pet-Adaptors', ['adaptors'=>$adaptors]);
    }

    public function Pets(){
        $pets=DB::table('pets')
                ->paginate(4);
        return view('Admin.Pets',['pets'=>$pets]);
    }

    public function ConnectedPeople(){
        $people=DB::table('requests')
                ->select('pets.pet_name',
                        'requests.status as r_status',
                        'pets.p_id',
                        'pets.pet_name',
                        'pets.pet_breed',
                        'pets.pet_type',
                        'pets.pet_image',
                        'donors.full_name as d_fname',
                        'donors.id as d_id',
                        'adaptors.id as a_id',
                        'adaptors.full_name as a_fname')
                        ->join('pets', 'requests.pet_id', '=', 'pets.p_id')
                        ->join('donors', 'requests.donor_id', '=', 'donors.id')
                        ->join('adaptors', 'requests.adaptor_id', '=', 'adaptors.id')
                        ->paginate(4);

        return view('Admin.Connected_People',["people"=>$people]);
        
    }

    public function PetHealth(){
        $people=DB::table('pethealths')
                ->select('pets.pet_name',
                        'pets.p_id',
                        'pethealths.image as pethealth_image',
                        'pethealths.Certificate as pethealth_cer',
                        'pethealths.Content',
                        'pethealths.created_at as c_at',
                        'donors.full_name as d_fname',
                        'donors.email as d_email',
                        'donors.id as d_id',
                        'adaptors.id as a_id',
                        'adaptors.full_name as a_fname',
                        'adaptors.email as a_email')
                        ->join('pets', 'pethealths.pet_id', '=', 'pets.p_id')
                        ->join('donors', 'pethealths.old_owner_id', '=', 'donors.id')
                        ->join('adaptors', 'pethealths.new_owner_id', '=', 'adaptors.id')
                        ->paginate(4);
        return view('Admin.PetHealth',['people'=>$people]);
    }

    public function Feedback(){
        $feedback=DB::table('feedbacks')
                ->paginate(4);
        return view('Admin.Feedbacks',['feedback'=>$feedback]);
    }

    public function VerifyFeedback(Request $req){
        DB::table('feedbacks')
        ->where('id',$req->id)
        ->update([
            'is_verified'=>1
        ]);

        return redirect()->route('admin.feedback')->with('success',"Feedback Verified");
    }

    public function SeeAllReports(){
        $reports=DB::table('reports')
                ->paginate(5);
        return view('Admin.Reports',['reports'=>$reports]);
    }

    public function ChangeImage(Request $req){
        $req->validate([
            'image' => 'required',
        ]);
        $path=$req->file('image')->store('Images','public');
        $pets=DB::table('admins')
        ->where('id', Auth::guard('admin')->user()->id)
        ->update([
            'image'=>$path
        ]);

        return redirect()->route('admin.profile')->with('success',"Image Updated Successfully");
    }

    public function ChangePassword(Request $req){
        $req->validate([
            'password' => 'required',
            'newpassword' => 'required',
            'cpassword'=>'required|same:newpassword'
        ]);
        

        if (Hash::check($req->password, Auth::guard('admin')->user()->password)) {
            $donors = DB::table('admins')
                ->where('id', Auth::guard('admin')->user()->id)
                ->update([
                    'password' => Hash::make($req->newpassword),
                ]); 
            return redirect()->route('admin.change-password')->with('success', "Password Changed Successfully");
        } else {
            return redirect()->route('admin.change-password')->with('error', "Password Is Not Matched");
        }
    }

    public function ChangeName(Request $req){
        $req->validate([
            'full_name' => 'required',
        ]);
        $pets=DB::table('admins')
        ->where('id', Auth::guard('admin')->user()->id)
        ->update([
            'full_name'=>$req->full_name
        ]);

        return redirect()->route('admin.profile')->with('success',"Profile Updated Successfully");
    }

    public function sentwarning(Request $req){
        $name=$req->reportie_name;
        $email=$req->reportie_email;
        Mail::to($email)->send(new WarningEmail($name));
        return redirect()->route('admin.reports')->with('success',"Warning Sent Successfully");
    }

    public function Block(Request $req){
        $name=$req->reportie_name;
        $email=$req->reportie_email;
        $email2=$req->reporter_email;
        $person2=$req->reporter_name;
        $person=$req->reportie_user;


        if($person == 1){
            $d=Donor::where('email',$email)->first();
            if($d->is_block == 1){
                return redirect()->route('admin.reports')->with('error',"User Already Blocked");
            }else{
                DB::table('donors')
                ->where('email', $email)
                ->update([
                    'is_block'=>1
                ]);
                Mail::to($email)->send(new BlockEmail($name));
                Mail::to($email2)->send(new ReportSuccessEmail($person2,$name));
                return redirect()->route('admin.reports')->with('success',"User Blocked");
            }
        }elseif($person == 2){
            $a=Adaptor::where('email',$email)->first();
            if($a->is_block == 1){
                return redirect()->route('admin.reports')->with('error',"User Already Blocked");
            }else{
                DB::table('adaptors')
                ->where('email', $email)
                ->update([
                    'is_block'=>1
                ]);
                Mail::to($email)->send(new BlockEmail($name));
                Mail::to($email2)->send(new ReportSuccessEmail($person2,$name));
                return redirect()->route('admin.reports')->with('success',"User Blocked");
            }
        }
        

    }


    public function UnblockAdaptor(Request $req){
        $name=$req->full_name;
        $email=$req->email;
        $a=Adaptor::where('email',$email)->first();
        if($a->is_block == 0){
            return redirect()->route('admin.adapt')->with('error','This User Is Not Blocked');
        }
        else{
            DB::table('adaptors')
            ->where('email',$email)
            ->update([
                'is_block'=>0
            ]);
            Mail::to($email)->send(new UnblockEmail($name));
            return redirect()->route('admin.adapt')->with('success',"User Unblocked");
        }
    }

    public function UnblockDonor(Request $req){
        $name=$req->full_name;
        $email=$req->email;
        $a=Donor::where('email',$email)->first();
        if($a->is_block == 0){
            return redirect()->route('admin.donors')->with('error','This User Is Not Blocked');
        }
        else{
            DB::table('donors')
            ->where('email',$email)
            ->update([
                'is_block'=>0
            ]);
            Mail::to($email)->send(new UnblockEmail($name));
            return redirect()->route('admin.donors')->with('success',"User Unblocked");
        }
    }
}
