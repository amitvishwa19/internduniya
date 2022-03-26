<?php

namespace App\Http\Controllers\Client\company;

use App\Models\User;
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
        $user = auth()->user();

        $profile = Corporate::findOrFail(auth()->user()->corporate->id);

        
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

        //$internships = Intenship::orderby('created_at','desc')->get();
        $internship = Intenship::findOrFail($id);
        //dd($internship);

        return view('client.pages.company.internship_edit')->with('internship',$internship);
    }

    public function internship_new(){



        return view('client.pages.company.internship_new');
    }

    public function internship_new_add(Request $request){

        //dd($request->all());

        $this->validate($request,[
            'title' => 'required|min:5|max:255',
            'description' => 'required',
            'duration' => 'required',
            'stipend' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
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
        $internship->type = $request->type;
        $internship->status = $request->status;
        $internship->save();

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
        $internship->type = $request->type;
        $internship->status = $request->status;
        $internship->save();

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



        return view('client.pages.company.resumes');
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
}
