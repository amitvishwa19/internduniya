<?php

namespace App\Http\Controllers\Admin;

use App\Models\Corporate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\CorporateRequest;

class CorporateController extends Controller
{
    public function __construct(){


    }

    public function index(Request $request)
    {

        
        if ($request->ajax()) {
            $companies = Corporate::orderby('created_at','desc')->latest('id');

            return Datatables::of($companies)
            ->editColumn('created_at',function(Corporate $company){
                return $company->created_at->diffForHumans();
            })
            ->addColumn('companymeta',function($company){
                if($company->avatar){
                    return '<div class="d-flex justify-content-between">
                                <div class="meta-box">
                                <div class="media">
                                    <img src="'.$company->avatar.'" height="40" class="mr-3 align-self-center rounded" alt="...">
                                    <div class="media-body align-self-center text-truncate">
                                        <h6 class="m-0 text-dark"><a href="'.route('corporate.edit',$company->id).'">'. $company->title.'</a></h6>
                                        <ul class="p-0 list-inline mb-0">
                                            <li class="list-inline-item text-muted">'.$company->created_at->diffForHumans().'</li>
                                            
                                        </ul>
                                    </div><!--end media-body-->
                                </div>                                      
                                </div><!--end meta-box-->
                                
                            </div>';
                }else{
                    return '<div class="d-flex justify-content-between">
                                <div class="meta-box">
                                    <div class="media">                                                                           
                                        <div class="media-body align-self-center text-truncate">
                                            <h6 class="m-0 text-dark"><a href="'.route('corporate.edit',$company->id).'">'. $company->title.'</h6>
                                            <ul class="p-0 list-inline mb-0">
                                                <li class="list-inline-item text-muted">'.$company->created_at->diffForHumans().'</li>
                                                
                                            </ul>
                                        </div><!--end media-body-->
                                    </div>                                            
                                </div><!--end meta-box-->
                                
                            </div>';
                }
            })
            ->addColumn('status',function(Corporate $corporate){
                if($corporate->status == true){
                    return '<div class="badge badge-success">Active</div>';
                }else{
                    return '<div class="badge badge-warning">InActive</div>';
                }
            })
            ->editColumn('type',function(Corporate $corporate){
                return ucfirst($corporate->type);
            })
            ->addColumn('action',function($data){
                $link = '<div class="d-flex">'.
                            '<a href="'.route('corporate.edit',$data->id).'" class="badge badge-soft-info mr-2"><small>Edit</small></a>'.
                            '<a href="javascript:void(0);" id="'.$data->id.'" class="badge badge-soft-danger delete"><small>Delete</small></a>'.
                        '</div>';
                return $link;
            })
            ->rawColumns(['action','companymeta','status'])
            ->make(true);


        }
        return view('admin.pages.corporate.corporate');

    }

    public function create()
    {
        return view('admin.pages.corporate.corporate_add');
    }

    public function store(Request $request)
    {

        //dd($request->all());
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $company = New Corporate;
        $company->title = $request->title;
        $company->slug = Str::slug($request->title,'-');
        $company->description = $request->description;
        
        if(!$request->file('avatar') == null){
            $avatar_url = uploadImage($request->file('avatar'));
            $company->avatar = $avatar_url;
        }

        $company->employees = $request->employees;
        $company->address = $request->address;
        $company->type = $request->type;
        $company->status = $request->status;
        $company->save();

        return redirect()->route('corporate.index')
        ->with([
            'message'    =>'Corporate Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $corporate = Corporate::findOrFail($id);

        return response()->json($corporate);
    }

    public function edit($id)
    {
        $corporate = Corporate::findOrFail($id);

        //return response()->json($corporate);

        return view('admin.pages.corporate.corporate_edit',compact('corporate'));
    }

    public function update(Request $request, $id)
    {

        $company = Corporate::findOrFail($id);
        $company->title = $request->title;
        $company->slug = Str::slug($request->title,'-');
        $company->description = $request->description;
        

        if(!$request->file('avatar') == null){
            $avatar_url = uploadImage($request->file('avatar'));
            $company->avatar = $avatar_url;
        }

        $company->employees = $request->employees;
        $company->address = $request->address;
        $company->type = $request->type;
        $company->status = $request->status;
        $company->save();

        return redirect()->route('corporate.index')
        ->with([
            'message'    =>'Corporate Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        $corporate = Corporate::destroy($id);

        if($corporate){
            return redirect()->route('corporate.index')
            ->with([
                'message'    =>'Corporate Updated Successfully',
                'alert-type' => 'success',
            ]);
        }else{

        }

    }
}
