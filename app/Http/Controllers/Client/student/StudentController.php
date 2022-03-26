<?php

namespace App\Http\Controllers\Client\student;

use App\Models\User;
use App\Models\Skill;
use App\Models\Resume;
use App\Models\Education;
use App\Models\Achivement;
use App\Models\Experience;
use Illuminate\Http\Request;
use App\Models\AppliedInternship;
use App\Models\FavouriteInternship;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    
    public function home(){


        return view('client.pages.student.dashboard');
    }


    public function profile(){

        $resume = auth()->user()->resume;

        

        //dd($resume);

        return view('client.pages.student.profile')->with('resume',$resume);
    }

    public function profile_update(Request $request){

        $resume = Resume::updateOrCreate([
            'user_id'   => auth()->user()->id,
        ],[
            'firstname'     => $request->firstname,
            'lastname'     => $request->lastname,
            'email'     => $request->email,
            'mobile'     => $request->mobile,
            'website'     => $request->website,
            'city'     => $request->city,
            'state'     => $request->state,
            'post_code'     => $request->post_code,
            'address'     => $request->address,
        ]); 

        $user = User::findOrFail(auth()->user()->id);
        $user->resume_id = $resume->id;
        $user->save();

        //dd($request->all());

        return redirect()->route('student.profile')
        ->with([
            'message'    =>'Profile Updated Successfully',
            'alert-type' => 'success',
        ]);
    }
    

    public function resume(){

        $resume = auth()->user()->resume;

        //dd($user->resume->education);

        return view('client.pages.student.resume')->with('resume',$resume);
    }
    public function resume_new(){

        $user = auth()->user();

        //dd($user->corporate->title);

        return view('client.pages.student.resume_new')->with('user',$user);
    } 


    public function resume_education(){

        $user = auth()->user();

        //dd($user->corporate->title);

        return view('client.pages.student.add_education')->with('user',$user);
    }
    public function resume_education_add(Request $request){

        //dd($request->all());
        //dd(auth()->user()->resume->id);

        if(auth()->user()->resume->id){

            $education  = new Education;
            $education->resume_id = auth()->user()->resume->id;
            $education->title = $request->title;
            $education->type = $request->type;
            $education->start_date = $request->start_date;
            $education->end_date = $request->end_date;
            $education->organization = $request->organization;
            $education->subject = $request->subject;
            $education->description = $request->description;
            $education->save();

            return redirect()->route('student.resume')
            ->with([
                'message'    =>'Education Qualifications Added Successfully',
                'alert-type' => 'success',
            ]);
        }
    }
    public function resume_education_edit($id){
        $education = Education::findOrFail($id);
        return view('client.pages.student.edit_education')->with('education',$education);
    }
    public function resume_education_update(Request $request,$id){


        return redirect()->route('student.resume')
        ->with([
            'message'    =>'Education Qualifications Updated Successfully',
            'alert-type' => 'success',
        ]);
    }
    public function resume_education_delete($id){

        $education = Education::destroy($id);
        if($education){
            return redirect()->route('student.resume')
            ->with([
                'message'    =>'Education Deleted Successfully',
                'alert-type' => 'success',
            ]);
        }
    }



    public function resume_experience(){

        $user = auth()->user();

        //dd($user->corporate->title);

        return view('client.pages.student.add_experience')->with('user',$user);
    }
    public function resume_experience_add(Request $request){


        //dd($request->all());

        $experience = new Experience;
        $experience->resume_id = auth()->user()->resume->id;
        $experience->title = $request->title;
        $experience->organization = $request->organization;
        $experience->start_date = $request->start_date;
        $experience->end_date = $request->end_date;
        $experience->description = $request->description;
        $experience->save();


        return redirect()->route('student.resume')
        ->with([
            'message'    =>'Experience Added Successfully',
            'alert-type' => 'success',
        ]);
    }
    public function resume_experience_edit($id){
        $experience = Experience::findOrFail($id);
        return view('client.pages.student.edit_experience')->with('experience',$experience);
    }
    public function resume_experience_update(Request $request,$id){

        $experience = Experience::findOrFail($id);
        $experience->title = $request->title;
        $experience->organization = $request->organization;
        $experience->start_date = $request->start_date;
        $experience->end_date = $request->end_date;
        $experience->description = $request->description;
        $experience->save();

        return redirect()->route('student.resume')
        ->with([
            'message'    =>'Experience Updated Successfully',
            'alert-type' => 'success',
        ]);
    }
    public function resume_experience_delete($id){

        $experience = Experience::destroy($id);
        if($experience){
            return redirect()->route('student.resume')
            ->with([
                'message'    =>'Experience Deleted Successfully',
                'alert-type' => 'success',
            ]);
        }
    }




    public function resume_skills(){

        $user = auth()->user();

        //dd($user->corporate->title);

        return view('client.pages.student.add_skills')->with('user',$user);
    }
    public function resume_skills_add(Request $request){

        $skill = new Skill;
        $skill->resume_id = auth()->user()->resume->id;
        $skill->title = $request->title;
        $skill->percentage = $request->percentage;
        $skill->save();


        return redirect()->route('student.resume')
        ->with([
            'message'    =>'Skill Added Successfully',
            'alert-type' => 'success',
        ]);
    }
    public function resume_skills_edit($id){
        $skill = Skill::findOrFail($id);
        return view('client.pages.student.edit_skills')->with('skill',$skill);
    }
    public function resume_skills_update(Request $request,$id){

        $skill = Skill::findOrFail($id);
        $skill->title = $request->title;
        $skill->percentage = $request->percentage;
        $skill->save();

        return redirect()->route('student.resume')
        ->with([
            'message'    =>'Skill Updated Successfully',
            'alert-type' => 'success',
        ]);
    }
    public function resume_skills_delete($id){

        $skill = Skill::destroy($id);
        if($skill){
            return redirect()->route('student.resume')
            ->with([
                'message'    =>'Skill Deleted Successfully',
                'alert-type' => 'success',
            ]);
        }
    }


    public function resume_achivement(){

        $user = auth()->user();

        //dd($user->corporate->title);

        return view('client.pages.student.add_achivements')->with('user',$user);
    }
    public function resume_achivement_add(Request $request){

        $achivement = new Achivement;
        $achivement->resume_id = auth()->user()->resume->id;
        $achivement->title = $request->title;
        $achivement->start_date = $request->start_date;
        $achivement->end_date = $request->end_date;
        $achivement->description = $request->description;
        $achivement->save();


        return redirect()->route('student.resume')
        ->with([
            'message'    =>'Achivement Added Successfully',
            'alert-type' => 'success',
        ]);
    }
    public function resume_achivement_edit($id){
        $achivement = Achivement::findOrFail($id);
        return view('client.pages.student.edit_achivements')->with('achivement',$achivement);
    }
    public function resume_achivement_update(Request $request,$id){

        $achivement = Achivement::findOrFail($id);
        $achivement->title = $request->title;
        $achivement->start_date = $request->start_date;
        $achivement->end_date = $request->end_date;
        $achivement->description = $request->description;
        $achivement->save();

        return redirect()->route('student.resume')
        ->with([
            'message'    =>'Skill Updated Successfully',
            'alert-type' => 'success',
        ]);
    }

    public function add_favourite_internship($id){

        //dd($id);
        //$user = auth()->user();

        $favourite = FavouriteInternship::where('intenship_id',$id)->where('user_id',auth()->user()->id)->first();

        $user = User::findOrFail(auth()->user()->id);
        //dd($user);
        //$user->favourite_internship()->sync($id);
        if($favourite == null){
            $favouriteInternship = New FavouriteInternship;
            $favouriteInternship->user_id = auth()->user()->id;
            $favouriteInternship->intenship_id = $id;
            $favouriteInternship->save();

            return redirect()->back()
            ->with([
                'message'    =>'Added to your favourite list',
                'alert-type' => 'success',
            ]);
        }else{
            return redirect()->back()
            ->with([
                'message'    =>'Dear candidate you have already add in favourite list',
                'alert-type' => 'alert-danger',
            ]);
        }

        
    }

    public function delete_favourite_internship($id){

        //dd($id);

        $favouriteInternship = FavouriteInternship::where('intenship_id',$id);
        $favouriteInternship->delete();


        if($favouriteInternship){
            return redirect()->back()
                    ->with([
                        'message'    =>'Shortlisted intership deleted successfully',
                        'alert-type' => 'success',
                    ]);
        }

    }

    public function apply_internship($id){

        $resume = auth()->user()->resume; 
        if($resume->firstname == null || $resume->lastname == null || $resume->email == null || $resume->mobile == null){
            return redirect()->back()
            ->with([
                'message'    =>'Dear candidate please complete your profile to apply for this Internship',
                'alert-type' => 'alert-danger',
            ]);
        }

        $applied = AppliedInternship::where('intenship_id',$id)->where('user_id',auth()->user()->id)->first();
        
        if($applied == null){

            $appliedInternship = New AppliedInternship;
            $appliedInternship->user_id = auth()->user()->id;
            $appliedInternship->intenship_id = $id;
            $appliedInternship->save();

            return redirect()->back()
            ->with([
                'message'    =>'Internship applied successfully',
                'alert-type' => 'alert-primary',
            ]);

        }else{
            return redirect()->back()
            ->with([
                'message'    =>'Dear candidate you have already applied for this Internship',
                'alert-type' => 'alert-danger',
            ]);
        }

        
    }



    public function internships_shortlisted(){

        $user = auth()->user();

        $favourites = auth()->user()->favourite_internships;
        return view('client.pages.student.internships')->with('favourites',$favourites);
    }

    public function internships_applied(){

        $user = auth()->user();

        //dd($user->corporate->title);

        $applied = auth()->user()->applied_internships;

        //dd($favourite);

        return view('client.pages.student.internships_applied')->with('applied',$applied);
    }


    public function cover_letter(){

        $user = auth()->user();

        //dd($user->corporate->title);

        return view('client.pages.student.cover_letter')->with('user',$user);
    }







    public function password_management(){


        return view('client.pages.student.password_management');
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
        

        return redirect()->route('student.password.management')
        ->with([
            'message'    =>'Password Updated Successfully',
            'alert-type' => 'success',
        ]);
    }
    
}
