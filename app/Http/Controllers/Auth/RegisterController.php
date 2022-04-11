<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Resume;
use App\Models\Corporate;
use Illuminate\Http\Request;
use App\Events\RegisterEvent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string','max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    // protected function create(array $data)
    // {

    //     $user =  User::create([
    //         'username' => $data['username'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //         'verification_code' => sha1(time()),
    //     ]);

    //     if($user != null){
    //         event(new RegisterEvent($user));
    //         return redirect()->back()->with(session()->flash('register_success','Account created successfully,please check your mail for activation code'));
    //     }


    //     return redirect()->back()->with(session()->flash('alert','account not created, please try again'));
    // }

    public function register(Request $request){

       

        $validate = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:6',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->verification_code = sha1(time());
        $user->type = 'user';
        if($request->type == 'student'){
            $user->role = 'student';
        }else{
            $user->role = 'corporate';
        }

        if(setting('student_credits') > 0){
            $user->subscribed = true;
            $user->subscription_date = Carbon::now();
            $user->renew_date = Carbon::now()->addDays(30);;
            $user->plan = 'Onboarding';
            $user->action_count = setting('student_credits'); 
        }
        
        $user->save();

        if($request->type == 'student'){
            $resume = new Resume;
            $resume->user_id = $user->id;
            $resume->save();

            $user = User::findOrFail($user->id);
            $user->resume_id = $resume->id;
            $user->save();
        }else{
            $corporate = new Corporate;
            $corporate->user_id = $user->id;
            $corporate->save();

            $user = User::findOrFail($user->id);
            $user->corporate_id = $corporate->id;
            $user->save();
        }


        if($user != null){
            event(new RegisterEvent($user));
            return redirect()->back()->with(session()->flash('register_success','Account created successfully,please check your mail for activation code'));
        }
        return redirect()->back()->with(session()->flash('register_alert','account not created, please try again'));
    }

    public function verifyUser(Request $request){

        //dd($request->code);
        $verification_code = $request->code;
        $user = User::where(['verification_code' => $verification_code])->first();

        if($user != null){
            $user->status = 1;
            $user->verification_code = null;
            $user->save();
            return redirect()->route('login')->with(session()->flash('verified','Your account is verified successfully, please login to continue'));
        }else{
            return redirect()->route('login')->with(session()->flash('invalid_token','Invalid verification code'));
        }


    }

}
