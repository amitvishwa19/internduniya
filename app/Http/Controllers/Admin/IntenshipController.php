<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\IntenshipRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Intenship;

class IntenshipController extends Controller
{
    public function __construct(){


    }

    public function index(Request $request)
    {


        if ($request->ajax()) {
            $intenships = Intenship::orderby('created_at','desc')->latest('id');

            return Datatables::of($intenships)
            ->editColumn('created_at',function(Intenship $intenship){
                return $intenship->created_at->diffForHumans();
            })
            ->addColumn('action',function($data){
                $link = '<div class="d-flex">'.
                            '<a href="'.route('internship.edit',$data->id).'" class="badge badge-info mr-2"><small>Edit</small></a>'.
                            '<a href="javascript:void(0);" id="'.$data->id.'" class="badge badge-secondary delete"><small>Delete</small></a>'.
                        '</div>';
                return $link;
            })
            ->addColumn('meta',function(Intenship $intenship){
                return '<div class="media">
                            <img src="'.$intenship->corporate->avatar.'" height="40" class="mr-3 align-self-center rounded" alt="...">
                            <div class="media-body align-self-center"> 
                                <a  class="m-0 d-block font-weight-semibold font-13">'.$intenship->corporate->title.'</a>
                                <a  class="font-12 text-primary">'.$intenship->corporate->email.'</a>                                                                                           
                            </div><!--end media body-->
                        </div>';

            })
            ->addColumn('status',function(Intenship $intenship){
                if($intenship->status == true){
                    return '<span  class="badge badge-soft-success"><small>Open</small></span>';
                }else{
                    return '<span  class="badge badge-soft-danger"><small>Closed</small></span>';
                }
            })
            ->addColumn('approved',function(Intenship $intenship){
                if($intenship->approved == true){
                    return '<span  class="badge badge-soft-success"><small>Approved</small></span>';
                }else{
                    return '<span  class="badge badge-soft-danger"><small>Draft</small></span>';
                }
            })
            ->rawColumns(['action','meta','status','approved'])
            ->make(true);


        }


        return view('admin.pages.intenship.intenship');

    }

    public function create()
    {
        return view('admin.pages.intenship.intenship_add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $intenship = New Intenship;
        $intenship->name = $request->name;
        $intenship->save();

        return redirect()->route('intenship.index')
        ->with([
            'message'    =>'Intenship Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $intenship = Intenship::findOrFail($id);

        return response()->json($intenship);
    }

    public function edit($id)
    {
        $intenship = Intenship::findOrFail($id);

        //return response()->json($intenship);

        return view('admin.pages.intenship.intenship_edit',compact('intenship'));
    }

    public function update(Request $request, $id)
    {
        $intenship = Intenship::findOrFail($id);
        $intenship->approved = $request->approved;
        $intenship->save();

        return redirect()->route('internship.index')
        ->with([
            'message'    =>'Intenship Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        $intenship = Intenship::destroy($id);

        if($intenship){
            return redirect()->route('intenship.index')
            ->with([
                'message'    =>'Intenship Updated Successfully',
                'alert-type' => 'success',
            ]);
        }else{

        }

    }
}
