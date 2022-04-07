<?php

namespace App\Http\Controllers\Client\company;

use App\Models\Post;
use App\Models\User;
use GuzzleHttp\Client;
use App\Models\Category;
use App\Models\Corporate;
use App\Models\Intenship;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    public function home(){

        $total_internship = auth()->user()->corporate->internships->count();
        $active_internship = auth()->user()->corporate->internships->where('status',true)->count();
        $internships = auth()->user()->corporate->internships;

        $applications = null;

        foreach($internships as $internship){
            $applications += $internship->applied_users->count();
        }


        $internships = auth()->user()->corporate->internships;
        return view('client.pages.company.dashboard')
                    ->with('internships',$internships)
                    ->with('total_internship',$total_internship)
                    ->with('applications',$applications)
                    ->with('active_internship',$active_internship);
    }


    public function profile(){

        $user = auth()->user();

        //dd($user->corporate->title);

        return view('client.pages.company.profile')->with('user',$user);
    }

    public function profile_update(Request $request){

        //dd($request->all());

        $this->validate($request,[
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'title' => 'required|max:255',
            'description' => 'required',
            'contact' => 'required',
            'email' => 'required|email',
            'type' => 'required',
        ],[
            'firstName.required' => ' First name of user is required',
            'lastName.required' => ' Last name of user is required',
            'title.required' => ' Name of Corporate is required',
            'description.required' => 'Shord description of corporate is required',
            'contact.required' => 'Contact detail of Corporate is required',
            'email.required' => 'Contact email of corporate is required',
            'type.required' => 'Corporate type is required',
        ]);


        $user = auth()->user();
        $profile = Corporate::findOrFail(auth()->user()->corporate->id);


        $user = User::findOrFail(auth()->user()->id);
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->profile = true;
        $user->save();

        $profile->title = $request->title;
        $profile->description = $request->description;
        $profile->employees = $request->employees;
        $profile->type = $request->type;
        $profile->address = $request->address;
        $profile->website = $request->website;
        $profile->contact = $request->contact;
        $profile->email = $request->email;

        if(!$request->file('avatar') == null){
            $avatar_url = uploadImage($request->file('avatar'));
            $profile->avatar = $avatar_url;
        }


        $profile->save();


        return redirect()->route('company.profile')
        ->with([
            'message'    =>'Profile Updated Successfully',
            'alert-type' => 'success',
        ]);
    }


    public function internship(){

        $internships = Intenship::orderby('created_at','desc')->get();

        $internships = auth()->user()->corporate->internships;
        //dd($user);

        return view('client.pages.company.internship')->with('internships',$internships);
    }

    public function internship_view($id){

        //$internships = Intenship::orderby('created_at','desc')->get();
        $internship = Intenship::findOrFail($id);
        //dd($internship);

        return view('client.pages.company.internship_view')->with('internship',$internship);
    }

    public function internship_edit($id){

        $internship_category = Category::where('slug','internship-categories')->first();
        $categories = Category::where('parent_id', $internship_category->id )->orderby('created_at','desc')->get();


        //dd($categories);
        //$internships = Intenship::orderby('created_at','desc')->get();
        $internship = Intenship::findOrFail($id);
        //dd($internship);

        return view('client.pages.company.internship_edit')->with('internship',$internship)->with('categories',$categories);
    }

    public function internship_new(){

        $corporate = auth()->user()->corporate; 
        // if($resume->firstname == null || $resume->lastname == null || $resume->email == null || $resume->mobile == null){
        //     return redirect()->back()
        //     ->with([
        //         'message'    =>'Dear candidate please complete your profile to apply for this Internship',
        //         'alert-type' => 'alert-danger',
        //     ]);
        // }



        $internship_category = Category::where('slug','internship-categories')->first();
        $categories = Category::where('parent_id', $internship_category->id )->orderby('created_at','desc')->get();

        return view('client.pages.company.internship_new')->with('categories',$categories);
    }

    public function internship_new_add(Request $request){

        //dd($request->all());

        $this->validate($request,[
            'title' => 'required|min:5|max:255',
            'description' => 'required',
            'duration' => 'required',
            'stipend' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'apply_date' => 'required',
            'total_opening' => 'required',
            'state' => 'required',
            'city' => 'required',
            'type' => 'required',
            'status' => 'required',

        ],[
            'title.required' => ' Title is required to to post new internship.',
            'description.required' => ' Description is required to to post new internship.',
            'duration.required' => ' Please specify duration',
            'stipend.required' => ' Please specify stipend',
            'start_date.required' => ' Please specify start date',
            'end_date.required' => ' Please specify end date',
            'apply_date.required' => ' Please specify last date to apply',
            'total_opening.required' => ' Please specify number of Openings',
            'state.required' => ' Please specify State',
            'city.required' => ' Please specify City',
            'type.required' => ' Please specify Opening Type',
            'status.required' => ' Please specify Status',
        ]);

        $internship = new Intenship;
        $internship->corporate_id = auth()->user()->corporate->id;
        $internship->user_id = auth()->user()->id;
        $internship->title = $request->title;
        $internship->slug = Str::slug($request->title,'-');
        $internship->description = $request->description;
        $internship->requirement = $request->requirement;
        $internship->duration = $request->duration;
        $internship->stipend = $request->stipend;
        $internship->start_date = $request->start_date;
        $internship->end_date = $request->end_date;
        $internship->apply_date = $request->apply_date;
        $internship->total_opening = $request->total_opening;
        $internship->state = $request->state;
        $internship->city = $request->city;
        $internship->pincode = $request->post_code;
        $internship->type = $request->type;
        $internship->status = $request->status;
        $internship->save();

        if(auth()->user()->action_count > 0){
            $user =  User::findOrFail(auth()->user()->id);
            $user->action_count -= 1;
            $user->save();

            if(auth()->user()->action_count -1 == 0 ){
               $user->subscribed = false; 
            }
            $user->save();
        }

        $internship->categories()->sync($request->categories);

        return redirect()->route('company.internship')
        ->with([
            'message'    =>'New Internship Added successfully',
            'alert-type' => 'success',
        ]);
    }

    public function internship_update(Request $request,$id){

        //dd($request->all());
        //$internships = Intenship::orderby('created_at','desc')->get();
        $internship = Intenship::findOrFail($id);
        $internship->title = $request->title;
        $internship->description = $request->description;
        $internship->requirement = $request->requirement;
        $internship->duration = $request->duration;
        $internship->stipend = $request->stipend;
        $internship->start_date = $request->start_date;
        $internship->end_date = $request->end_date;
        $internship->apply_date = $request->apply_date;
        $internship->total_opening = $request->total_opening;
        $internship->state = $request->state;
        $internship->city = $request->city;
        $internship->pincode = $request->post_code;
        $internship->type = $request->type;
        $internship->status = $request->status;
        $internship->save();

        $internship->categories()->sync($request->categories);

        return redirect()->route('company.internship')
        ->with([
            'message'    =>'Internship Updated successfully',
            'alert-type' => 'success',
        ]);
    }

    public function internship_delete($id){
        $internship = Intenship::destroy($id);
        if($internship){
            return redirect()->route('company.internship')
            ->with([
                'message'    =>'Internship deleted Successfully',
                'alert-type' => 'success',
            ]);
        }

    }


    public function applied_users(){
        return view('client.pages.company.internship_applied');
    }

    public function internship_applications($id){

        $internship = Intenship::findOrFail($id);
        return view('client.pages.company.internship_applications')->with('internship',$internship);
    }

    public function internship_user_resume($id){

        $user = User::findOrFail($id);

        //dd($user->resume->education);
        return view('client.pages.company.user_resume')->with('user',$user);
    }

    public function resumes(){
        $internships = auth()->user()->corporate->internships;
        //dd($internships);
        // $applications = null;

        // foreach($internships as $internship){
        //     $applications += $internship->applied_users->count();
        // }


        return view('client.pages.company.resumes')->with('internships',$internships);
    }

    public function password_management(){


        return view('client.pages.company.password_management');
    }

    public function password_update(Request $request){

        //dd($request->all());
        
        $validate = $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, auth()->user()->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }],
            'new_password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|min:6',
        ]);

        $user = User::findOrFail( auth()->user()->id);
        $user->password = Hash::make($request->new_password);;
        //$user->save();
        

        return redirect()->route('company.password.management')
        ->with([
            'message'    =>'Password Updated Successfully',
            'alert-type' => 'success',
        ]);
    }

    public function getlocation(Request $request){

        //$data = file_get_contents('https://postalpincode.in/api/pincode/'.$request->pincode);
        $client = new Client();

        $response = $client->get('http://postalpincode.in/api/pincode/'.$request->pincode);

        return $response;
    }

    public function subscription(){

        $corporate_plans = Post::whereHas('categories', function($q)
        {
            $q->where('slug', '=', 'corporate-plans');
        })->get();
        
        return view('client.pages.company.subscription')->with('corporate_plans',$corporate_plans);
    }
}
