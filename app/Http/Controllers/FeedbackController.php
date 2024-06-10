<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    public function SubmitFeedback(Request $req){

        $req->validate([
            'name' => 'required',
            'ratings' => 'required',
            'designation' => 'required',
            'feedback' => 'required',
            'email' => 'required|email',
        ]);
    
        // Check if the image file is uploaded
        $path = "Images/Avatar.jpg";
        if ($req->hasFile('image')) {
            $path = $req->file('image')->store('Images', 'public');
        }
    
        DB::table('feedbacks')->insert([
            'full_name' => $req->name,
            'designation' => $req->designation,
            'ratings' => $req->ratings,
            'feedback' => $req->feedback,
            'email' => $req->email,
            'image' => $path, // This will be null if no image is uploaded
            'created_at' => now(),
            'updated_at' => now()
        ]);
    
        return redirect()->route('feedback')->with('success', "Feedback Submitted Successfully");
    }

    public function Feedback(){
        $feedback=DB::table('feedbacks')
                ->where('is_verified',1)
                ->get();
        return view('Home',['feedback'=>$feedback]);
    }
    
}
