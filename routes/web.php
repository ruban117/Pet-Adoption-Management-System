<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Pet_Donors\DonorController;
use App\Http\Controllers\Pet_Adaptors\AdaptorController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\FeedbackController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/feedback', function () {
    return view('Contact-Us');
})->name('feedback');

Route::post('/submit-feedback',[FeedbackController::class,'SubmitFeedback'])->name('submit-feedback');


Route::get('/home/about', function () {
    return view('About');
})->name('AboutUsPage');



Route::get('/avliable_dogs_cats/detail/questions', function () {
    return view('Questions');
})->name('questions');

Route::get('/home/login-type', function () {
    return view('Select-Login');
})->name('select-login');







####################################################DONOR ROUTES##################################################

Route::group(['prefix' => 'donor'], function(){

    #Guest Routes
    Route::group(['middleware' => 'donor.guest'], function(){
        Route::get('/home/donor-login',[DonorController::class,'index'])->name('donor-login');
        Route::post('/donor-reg',[DonorController::class,'registerdonor'])->name('donor.register');
        Route::post('/authenticate',[DonorController::class,'donorauthenticate'])->name('donor.authenticate');
        Route::get('/otp-validate',[DonorController::class,'validateOTP'])->name('otp-validate-donor');
        Route::post('/otp-verify',[DonorController::class,'verifyOTP'])->name('otp-verify-donor');
        Route::get('/donor-signup',[DonorController::class,'DonorSignup'])->name('donor-signup');
        Route::post('/donor-email',[DonorController::class,'CheckEmail'])->name('donor.checkemail');
        Route::get('/donor-otp-forget',function(){
            return view('Pet-Donors.OTP_Forget');
        })->name('donors.otp-forget');
        Route::get('/donor-otp-forget-password', function () {
            return view('Pet-Donors.Forget_Password_Donor');
        })->name('donor.password-reset-form');
        Route::post('/donor-otp-verify-password',[DonorController::class,'VerifyPasswordOTP'])->name('donor.otppassverify');
        Route::post('/donor-forget-password',[DonorController::class,'ForgetPassword'])->name('donor.forget');
    });

    #Auth Routes
    Route::group(['middleware' => 'donor.auth'], function(){
        Route::get('/dashboard',[DonorController::class,'dashboard'])->name('donor-dashboard');
        Route::get('/dashboard/my-pets',[DonorController::class,'mypets'])->name('donor-pets');
        Route::get('/dashboard/add-new-pet',[DonorController::class,'newpet'])->name('donor-new-pet');
        Route::post('/add-pets',[DonorController::class,'AddPet'])->name('add-pet');
        Route::get('/show-pets/{id}',[DonorController::class,'showpet'])->name('show-pet');
        Route::get('/update-pets/{id}',[DonorController::class,'updatepet'])->name('update-pet');
        Route::post('donor/update-pets/{id}',[DonorController::class,'updateformpet'])->name('update-pet-form');
        Route::post('donor/update-pets-image/{id}',[DonorController::class,'updatepetimage'])->name('update-pet-image');
        Route::post('donor/update-pets-certificate/{id}',[DonorController::class,'updatepetcertificate'])->name('update-pet-certificate');
        Route::get('/My-Profile',[DonorController::class,'myprofile'])->name('my-profile');
        Route::get('/My-Profile/edit-profile',[DonorController::class,'editprofile'])->name('editprofile-view');
        Route::post('/My-Profile/edit-profile-one',[DonorController::class,'editprofileone'])->name('editprofile-one');
        Route::post('/My-Profile/edit-profile-image',[DonorController::class,'editprofileimage'])->name('editprofile-image');
        Route::get('/change-password',[DonorController::class,'ChangePasswordView'])->name('change-password-view');
        Route::get('/Request-History',[DonorController::class,'RequestView'])->name('Request-view');
        Route::post('/change-password-action',[DonorController::class,'ChangePassword'])->name('change-password-action');
        Route::post('/accept',[DonorController::class,'Accept'])->name('adaptor-accept');
        Route::post('/reject',[DonorController::class,'Reject'])->name('adaptor-reject');
        Route::post('/report-donor',[DonorController::class,'SubmitReport'])->name('donor-report');
        Route::get('/pet-status',[DonorController::class,'PetStatus'])->name('donor-pet-status');
        Route::get('/logout',[DonorController::class,'Logout'])->name('donor-logout');
    });
});


#############################################ADMIN ROUTES#######################################################


Route::group(['prefix' => 'admin'], function(){

    #Guest Routes
    Route::group(['middleware' => 'admin.guest'], function(){
        Route::get('/login',[AdminLoginController::class,'index'])->name('admin.login');
        Route::post('/authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');
        Route::post('/check-email',[AdminLoginController::class,'CheckEmail'])->name('admin.emailauthenticate');
        Route::post('/otp-verify-admin',[AdminLoginController::class,'VerifyOTP'])->name('admin.otpverify');
        Route::get('/admin-otp-verify', function () {
            return view('Admin.OTP_FORM');
        })->name('admin.otp-form');
        Route::get('/admin-otp-forget-password', function () {
            return view('Admin.ForgetPassword');
        })->name('admin.password-reset-form');

        Route::post('/forget-password',[AdminLoginController::class,'ForgetPassword'])->name('admin.forget');
    });

    #Auth Routes
    Route::group(['middleware' => 'admin.auth'], function(){
        Route::get('/dashboard',[HomeController::class,'index'])->name('admin.home');
        Route::get('/pet-donors',[HomeController::class,'PetDonors'])->name('admin.donors');
        Route::get('/pet-adaptors',[HomeController::class,'Pets'])->name('admin.pets');
        Route::get('/profile', function () {
            return view('Admin.Profile');
        })->name('admin.profile');
        Route::get('/changepassword', function () {
            return view('Admin.ChangePassword');
        })->name('admin.change-password');
        Route::get('/admin-adaptors',[HomeController::class,'PetAdaptors'])->name('admin.adapt');
        Route::get('/admin-pethealth',[HomeController::class,'PetHealth'])->name('admin.pethealth');
        Route::get('/admin-feedback',[HomeController::class,'Feedback'])->name('admin.feedback');
        Route::get('/admin-connected-people',[HomeController::class,'ConnectedPeople'])->name('admin.connected');
        Route::get('/admin-routes',[HomeController::class,'SeeAllReports'])->name('admin.reports');
        Route::post('/admin-change-image',[HomeController::class,'ChangeImage'])->name('admin.changeimage');
        Route::post('/admin-change-pass',[HomeController::class,'ChangePassword'])->name('admin.change-pass');
        Route::post('/admin-change-name',[HomeController::class,'ChangeName'])->name('admin.change-name');
        Route::post('admin-warning',[HomeController::class,'sentwarning'])->name('admin.warning');
        Route::post('admin-block',[HomeController::class,'Block'])->name('admin.block');
        Route::post('admin-adaptor-unblock',[HomeController::class,'UnblockAdaptor'])->name('admin.adaptor.unblock');
        Route::post('admin-donor-unblock',[HomeController::class,'UnblockDonor'])->name('admin.donor.unblock');
        Route::post('admin-feedback-verify',[HomeController::class,'VerifyFeedback'])->name('admin-verify-feedback');
        Route::get('/dashboard/logout',[HomeController::class,'Logout'])->name('admin.logout');
    });
});




####################################################ADAPTOR ROUTES##################################################


Route::group(['prefix' => 'adaptor'], function(){

    #Guest Routes
    Route::group(['middleware' => 'adaptor.guest'], function(){
        Route::get('/home/adaptor-login',[AdaptorController::class,'index'])->name('adaptor-login');
        Route::post('/adoptor-reg',[AdaptorController::class,'registeradaptor'])->name('adaptor.register');
        Route::post('/authenticate',[AdaptorController::class,'adaptorauthenticate'])->name('adaptor.authenticate');
        Route::get('/otp-validate',[AdaptorController::class,'validateOTP'])->name('otp-validate');
        Route::post('/otp-verify',[AdaptorController::class,'verifyOTP'])->name('otp-verify');
        Route::get('/adaptor-signup',[AdaptorController::class,'AdaptorSignup'])->name('adaptor-signup');
        Route::post('/adaptor-email',[AdaptorController::class,'CheckEmail'])->name('adaptor.checkemail');
        Route::get('/adaptor-otp-forget',function(){
            return view('Pet-Adaptor.OTP_Forget');
        })->name('adaptors.otp-forget');
        Route::get('/adaptor-otp-forget-password', function () {
            return view('Pet-Adaptor.Forget_Adaptor_Password');
        })->name('adaptor.password-reset-form');
        Route::post('/otp-verify-password',[AdaptorController::class,'VerifyPasswordOTP'])->name('adaptor.otppassverify');
        Route::post('/forget-password',[AdaptorController::class,'ForgetPassword'])->name('adaptor.forget');
    });

    #Auth Routes
    Route::group(['middleware' => 'adaptor.auth'], function(){
        Route::get('/dashboard',[AdaptorController::class,'dashboard'])->name('adaptor-dashboard');
        Route::get('/dashboard/my-pets',[AdaptorController::class,'mypets'])->name('adaptor-pets');
        Route::get('/adaptor-update-pets/{id}',[AdaptorController::class,'updateadaptorpet'])->name('update-adaptor-pet');
        Route::get('/pet-health/{id}',[AdaptorController::class,'PetHealth'])->name('pet-health');
        Route::post('/submit-pet-health/{id}',[AdaptorController::class,'SubmitPetHealth'])->name('submit-pet-health');
        Route::post('adaptor/update-pets/{id}',[AdaptorController::class,'updateformpet'])->name('update-adaptor-pet-form');
        Route::post('adaptor/update-pets-image/{id}',[AdaptorController::class,'updatepetimage'])->name('update-adaptor-pet-image');
        Route::post('adaptor/update-pets-certificate/{id}',[AdaptorController::class,'updatepetcertificate'])->name('update-adaptor-pet-certificate');
        Route::get('/Adaptor-History',[AdaptorController::class,'AdaptorHistory'])->name('Adaptor-History-view');
        Route::post('/report-adaptor',[AdaptorController::class,'SubmitReport'])->name('adaptor-report');
        Route::get('/Avliable-Pets',[AdaptorController::class,'avliablepets'])->name('adaptor-avliablepets');
        Route::post('/Avliable-Pets/submit',[AdaptorController::class,'AvaliablePetsForDonation'])->name('adaptor-avliablepets-sub');
        Route::get('/My-Profile',[AdaptorController::class,'myprofile'])->name('adaptor-my-profile');
         Route::get('/My-Profile/edit-profile',[AdaptorController::class,'editprofile'])->name('adaptor-editprofile-view');
         Route::post('/My-Profile/edit-profile-one',[AdaptorController::class,'editprofileone'])->name('adaptor-editprofile-one');
         Route::post('/My-Profile/edit-profile-image',[AdaptorController::class,'editprofileimage'])->name('adaptor-editprofile-image');
         Route::get('/change-password',[AdaptorController::class,'ChangePasswordView'])->name('adaptor-change-password-view');
         Route::post('/change-password-action',[AdaptorController::class,'ChangePassword'])->name('adaptor-change-password-action');
         Route::get('/pet-details/{id}',[AdaptorController::class,'showpetdetails'])->name('adaptor-pet-details');
         Route::get('/pet-adoption-questions/{id}',[AdaptorController::class,'petquestions'])->name('adaptor-pet-questions');
         Route::post('/calculate-score', [AdaptorController::class,'calculateScore'])->name('adaptor-calculateScore');
         Route::get('/show-adaptor-pets/{id}',[AdaptorController::class,'showadaptorpet'])->name('show-adaptor-pet');
        Route::get('/logout',[AdaptorController::class,'Logout'])->name('adaptor-logout');
    });
});

Route::get('/',[FeedbackController::class,'Feedback'])->name('HomePage');