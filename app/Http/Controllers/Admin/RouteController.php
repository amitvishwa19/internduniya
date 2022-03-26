<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RouteRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Route;

class RouteController extends Controller
{
    public function __construct(){


    }

    public function index(Request $request)
    {

        //dd(Route::orderby('created_at','desc')->latest('id'));
        if ($request->ajax()) {
            $routes = Route::orderby('created_at','desc')->latest('id');

            return Datatables::of($routes)
            ->editColumn('created_at',function(Route $route){
                return $route->created_at->diffForHumans();
            })
            ->addColumn('status',function(Route $route){
                if($route->status == true){
                    return '<a href="'.route('route.edit',$route->id).'" class="badge badge-soft-success"><small>Active</small></a>';
                }else{
                    return '<a href="'.route('route.edit',$route->id).'" class="badge badge-soft-dark"><small>InActive</small></a>';
                }
            })
            ->addColumn('action',function($data){
                $link = '<div class="d-flex">'.
                '<a href="'.route('route.edit',$data->id).'" class="badge badge-soft-primary mr-2"><small>Edit</small></a>'.
                '<a href="javascript:void(0);" id="'.$data->id.'" class="badge badge-soft-danger delete"><small>Delete</small></a>'.
                        '</div>';
                return $link;
            })
            ->rawColumns(['action','status'])
            ->make(true);


        }


        return view('admin.pages.route.route');

    }

    public function create()
    {
        return view('admin.pages.route.route_add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $route = New Route;
        $route->name = $request->name;
        $route->save();

        return redirect()->route('route.index')
        ->with([
            'message'    =>'Route Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $route = Route::findOrFail($id);

        return response()->json($route);
    }

    public function edit($id)
    {
        $route = Route::findOrFail($id);

        //return response()->json($route);

        return view('admin.pages.route.route_edit',compact('route'));
    }

    public function update(Request $request, $id)
    {

        $validate = $request->validate([
            'name' => 'required'
        ]);

        $route = Route::findOrFail($id);
        $route->name = $request->name;
        $route->save();

        return redirect()->route('route.index')
        ->with([
            'message'    =>'Route Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        $route = Route::destroy($id);

        if($route){
            return redirect()->route('route.index')
            ->with([
                'message'    =>'Route Updated Successfully',
                'alert-type' => 'success',
            ]);
        }else{

        }

    }
}
