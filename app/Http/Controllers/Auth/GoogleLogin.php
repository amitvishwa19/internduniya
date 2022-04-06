<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Resume;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleLogin extends Controller
{
    public function redirectToGoogle(){

        return Socialite::driver('google')->redirect();

    }



    public function handleGoogleCallback(){

        try {
    
            $user = Socialite::driver('google')->user();

            //dd($user);
     
            $finduser = User::where('email', $user->email)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/');
     
            }else{
                //dd($user->user['family_name']);
                $newUser = User::create([
                    'firstName' => $user->user['given_name'],
                    'lastName' => $user->user['family_name'],
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('password'),
                    'avatar_url' =>$user->avatar,
                    'type' =>'user',
                    'role' => 'student',
                    'status' => true,
                ]);

                $resume = new Resume;
                $resume->user_id = $newUser->id;
                $resume->save();

                $user = User::findOrFail($newUser->id);
                $user->resume_id = $resume->id;

                //Free Subscription Credits
                if(setting('student_credits') > 0){
                    $user->subscribed = true;
                    $user->subscription_date = Carbon::now();
                    $user->renew_date = Carbon::now()->addDays(30);;
                    $user->plan = 'Onboarding';
                    $user->action_count = setting('student_credits'); 
                }
                $user->save();

                Auth::login($newUser);
                return redirect('/');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
