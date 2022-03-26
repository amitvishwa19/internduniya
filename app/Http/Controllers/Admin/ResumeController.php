<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ResumeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Resume;

class ResumeController extends Controller
{
    public function __construct(){


    }

    public function index(Request $request)
    {


        if ($request->ajax()) {
            $resumes = Resume::orderby('created_at','desc')->latest('id');

            return Datatables::of($resumes)
            ->editColumn('created_at',function(Resume $resume){
                return $resume->created_at->diffForHumans();
            })
            ->addColumn('action',function($data){
                $link = '<div class="d-flex">'.
                            '<a href="'.route('resume.edit',$data->id).'" class="badge badge-info mr-2"><small>Edit</small></a>'.
                            '<a href="javascript:void(0);" id="'.$data->id.'" class="badge badge-secondary delete"><small>Delete</small></a>'.
                        '</div>';
                return $link;
            })
            ->rawColumns(['action'])
            ->make(true);


        }


        return view('admin.pages.resume.resume');

    }

    public function create()
    {
        return view('admin.pages.resume.resume_add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $resume = New Resume;
        $resume->name = $request->name;
        $resume->save();

        return redirect()->route('resume.index')
        ->with([
            'message'    =>'Resume Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $resume = Resume::findOrFail($id);

        return response()->json($resume);
    }

    public function edit($id)
    {
        $resume = Resume::findOrFail($id);

        //return response()->json($resume);

        return view('admin.pages.resume.resume_edit',compact('resume'));
    }

    public function update(Request $request, $id)
    {

        $validate = $request->validate([
            'name' => 'required'
        ]);

        $resume = Resume::findOrFail($id);
        $resume->name = $request->name;
        $resume->save();

        return redirect()->route('resume.index')
        ->with([
            'message'    =>'Resume Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        $resume = Resume::destroy($id);

        if($resume){
            return redirect()->route('resume.index')
            ->with([
                'message'    =>'Resume Updated Successfully',
                'alert-type' => 'success',
            ]);
        }else{

        }

    }
}
