<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CompanyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Company;

class CompanyController extends Controller
{
    public function __construct(){


    }

    public function index(Request $request)
    {


        if ($request->ajax()) {
            $companies = Company::orderby('created_at','desc')->latest('id');

            return Datatables::of($companies)
            ->editColumn('created_at',function(Company $company){
                return $company->created_at->diffForHumans();
            })
            ->addColumn('companymeta',function($company){
                if($company->avatar){
                    return '<div class="d-flex justify-content-between">
                                <div class="meta-box">
                                <div class="media">
                                    <img src="'.$company->avatar.'" height="40" class="mr-3 align-self-center rounded" alt="...">
                                    <div class="media-body align-self-center text-truncate">
                                        <h6 class="m-0 text-dark"><a href="'.route('company.edit',$company->id).'">'. $company->title.'</a></h6>
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
                                            <h6 class="m-0 text-dark"><a href="'.route('company.edit',$company->id).'">'. $company->title.'</h6>
                                            <ul class="p-0 list-inline mb-0">
                                                <li class="list-inline-item text-muted">'.$company->created_at->diffForHumans().'</li>
                                                
                                            </ul>
                                        </div><!--end media-body-->
                                    </div>                                            
                                </div><!--end meta-box-->
                                
                            </div>';
                }
            })
            ->addColumn('action',function($data){
                $link = '<div class="d-flex">'.
                            '<a href="'.route('company.edit',$data->id).'" class="badge badge-soft-info mr-2"><small>Edit</small></a>'.
                            '<a href="javascript:void(0);" id="'.$data->id.'" class="badge badge-soft-danger delete"><small>Delete</small></a>'.
                        '</div>';
                return $link;
            })
            ->rawColumns(['action','companymeta'])
            ->make(true);


        }


        return view('admin.pages.company.company');

    }

    public function create()
    {
        return view('admin.pages.company.company_add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $company = New Company;
        $company->title = $request->title;
        $company->description = $request->description;
        
        if(!$request->file('avatar') == null){
            $avatar_url = uploadImage($request->file('avatar'));
            $company->avatar = $avatar_url;
        }

        $company->employees = $request->employee;
        $company->address = $request->address;
        $company->type = $request->type;
        $company->status = $request->status;
        $company->save();

        return redirect()->route('company.index')
        ->with([
            'message'    =>'Company Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $company = Company::findOrFail($id);

        return response()->json($company);
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);

        //return response()->json($company);

        return view('admin.pages.company.company_edit',compact('company'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->file('avatar'));
        $company = Company::findOrFail($id);
        $company->title = $request->title;
        $company->description = $request->description;
        

        if(!$request->file('avatar') == null){
            $avatar_url = uploadImage($request->file('avatar'));
            $company->avatar = $avatar_url;
        }

        $company->employees = $request->employee;
        $company->address = $request->address;
        $company->type = $request->type;
        $company->status = $request->status;
        $company->save();

        return redirect()->route('company.index')
        ->with([
            'message'    =>'Company Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        $company = Company::destroy($id);

        if($company){
            return redirect()->route('company.index')
            ->with([
                'message'    =>'Company Updated Successfully',
                'alert-type' => 'success',
            ]);
        }else{

        }

    }
}
