<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function __construct(){


    }

    public function index(Request $request)
    {


        if ($request->ajax()) {
            $profiles = Profile::orderby('created_at','desc')->latest('id');

            return Datatables::of($profiles)
            ->editColumn('created_at',function(Profile $profile){
                return $profile->created_at->diffForHumans();
            })
            ->addColumn('action',function($data){
                $link = '<div class="d-flex">'.
                            '<a href="'.route('profile.edit',$data->id).'" class="mr-2"><small>Edit</small></a>'.
                            '<a href="javascript:void(0);" id="'.$data->id.'" class="delete"><small>Delete</small></a>'.
                        '</div>';
                return $link;
            })
            ->rawColumns(['action'])
            ->make(true);


        }


        return view('admin.pages.profile.profile');

    }

    public function create()
    {
        return view('admin.pages.profile.profile_add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $profile = New Profile;
        $profile->name = $request->name;
        $profile->save();

        return redirect()->route('profile.index')
        ->with([
            'message'    =>'Profile Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $profile = Profile::findOrFail($id);

        return response()->json($profile);
    }

    public function edit($id)
    {
        $profile = Profile::findOrFail($id);

        //return response()->json($profile);

        return view('admin.pages.profile.profile_edit',compact('profile'));
    }

    public function update(Request $request, $id)
    {

        $validate = $request->validate([
            'name' => 'required'
        ]);

        $profile = Profile::findOrFail($id);
        $profile->name = $request->name;
        $profile->save();

        return redirect()->route('profile.index')
        ->with([
            'message'    =>'Profile Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        $profile = Profile::destroy($id);

        if($profile){
            return redirect()->route('profile.index')
            ->with([
                'message'    =>'Profile Updated Successfully',
                'alert-type' => 'success',
            ]);
        }else{

        }

    }
}
