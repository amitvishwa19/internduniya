<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    public function __construct(){


    }

    public function index(Request $request)
    {


        if ($request->ajax()) {
            $projects = Project::orderby('created_at','desc')->latest('id');

            return Datatables::of($projects)
            ->editColumn('created_at',function(Project $project){
                return $project->created_at->diffForHumans();
            })
            ->addColumn('name',function(Project $project){
                // return $user->firstName. ", " .$user->lastName;

                return '<div class="media-body align-self-center">
                            <h6 class="m-0"><b><a href="'.route('project.show',$project->id).'">'. $project->name.'</b></h6>
                            <small><a href="'.route('client.show',$project->client->id).'"><span class="badge badge-soft-info">'.$project->client->name.'</span></a></small
                        </div>';
            })
            ->addColumn('requirement',function(Project $project){
                return '<a href="'.route('project.show',$project->id).'">'.substr($project->requirement, 0, 100).'</a>' ;
            })
            ->addColumn('priority',function(Project $project){
                //if($project->priority == 'low'){'dasdad'};
                return $project->priority;
            })
            ->addColumn('start_date',function(Project $project){
                return date('d-m-Y', strtotime($project->start_date));
            })
            ->addColumn('end_date',function(Project $project){
                return date('d-m-Y', strtotime($project->end_date));
            })
            ->addColumn('status',function(Project $project){
                return '<div class="media-body align-self-center">'
                            . Str::ucfirst($project->status).
                            '<span class="badge badge-info ml-2">'. $project->completion_status .'%</span>
                        </div>';
            })
            ->addColumn('action',function($data){
                $link = '<div class="d-flex">'.
                            '<a href="'.route('project.show',$data->id).'" class="badge badge-soft-success mr-2"><small>View</small></a>'.
                            '<a href="'.route('project.edit',$data->id).'" class="badge badge-soft-info mr-2"><small>Edit</small></a>'.
                            '<a href="javascript:void(0);" id="'.$data->id.'" class="badge badge-soft-danger delete"><small>Delete</small></a>'.
                        '</div>';
                return $link;
            })
            ->rawColumns(['action','name','status','requirement'])
            ->make(true);


        }

        $projectCount = Project::count();
        $projectCompleted = Project::where('status','completed')->count();
        $totalbudget = Project::sum('rate');
        return view('admin.pages.project.project')
                ->with('projectCount',$projectCount)
                ->with('projectCompleted',$projectCompleted)
                ->with('totalbudget',$totalbudget);

    }

    public function create()
    {
        $clients = Client::get();
        return view('admin.pages.project.project_add')->with('clients',$clients);
    }

    public function store(Request $request)
    {

        //dd( $request->all());
        $validate = $request->validate([
            'name' => 'required',
            'client_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $project = New Project;
        $project->name = $request->name;
        $project->client_id = $request->client_id;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->requirement = $request->requirement;
        $project->description = $request->description;
        $project->rate = $request->rate;
        $project->price_type = $request->price_type;
        $project->invoice_time = $request->invoice_time;
        $project->priority = $request->priority;
        $project->status = $request->status;
        $project->completion_status = $request->completion_status;
        $project->notes = $request->notes;
        $project->save();

        return redirect()->route('project.index')
        ->with([
            'message'    =>'Project Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $project = Project::findOrFail($id);

        //$sd = Carbon::createFromFormat('d-m-Y', $project->start_date);
        $stdt=Carbon::parse($project->start_date);
        $etdt=Carbon::parse($project->end_date);
        $nw = Carbon::parse(now());
        $days = ($nw->diffInDays($etdt));

        if($nw > $etdt){
            $days = 0;
        }


        //$dl = $ed - $nw;
        //dd($days);
        return view('admin.pages.project.project_view')->with('project',$project )->with('days',$days);
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $clients = Client::get();
        //return response()->json($project);

        return view('admin.pages.project.project_edit')->with('project',$project)->with('clients',$clients);
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $validate = $request->validate([
            'name' => 'required',
            'client_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $project = Project::findOrFail($id);
        $project->name = $request->name;
        $project->client_id = $request->client_id;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->requirement = $request->requirement;
        $project->description = $request->description;
        $project->rate = $request->rate;
        $project->price_type = $request->price_type;
        $project->invoice_time = $request->invoice_time;
        $project->priority = $request->priority;
        $project->status = $request->status;
        $project->completion_status = $request->completion_status;
        $project->notes = $request->notes;
        $project->save();

        return redirect()->route('project.index')
        ->with([
            'message'    =>'Project Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        $project = Project::destroy($id);

        if($project){
            return redirect()->route('project.index')
            ->with([
                'message'    =>'Project Updated Successfully',
                'alert-type' => 'success',
            ]);
        }else{

        }

    }
}
