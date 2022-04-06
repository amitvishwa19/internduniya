<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Corporate;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserController extends Controller
{


    public function index(Request $request)
    {
        $users = User::orderby('created_at','desc')->latest('id');

        if ($request->ajax()) {
            $users = User::orderby('created_at','desc')->latest('id');

            return Datatables::of($users)
            ->editColumn('created_at',function(User $user){
                return $user->created_at->diffForHumans();
            })
            ->editColumn('username',function(User $user){
                //return $user->userName;

                if($user->userName == null){
                    return '<span  class="badge badge-soft-danger delete"><small>Not Set</small></span>';
                }else{
                    //return $user->userName;
                    return '<span class="badge badge-soft-primary mr-2"><small>'.$user->userName.'</small></span>';
                }
            })
            ->addColumn('name',function(User $user){
                // return $user->firstName. ", " .$user->lastName;

                return '<div class="media-body align-self-center">
                            <h6 class="m-0"><b>'. $user->firstName. ", " .$user->lastName.'</b></h6>
                            <small>'.$user->email.'</small
                        </div>';
            })
            ->addColumn('type',function(User $user){
                return '<span class="badge badge-soft-primary mr-2"><small>'.$user->type.'</small></span>';
            })
            ->addColumn('status',function(User $user){
                if($user->status == true){
                    return '<span class="badge badge-soft-success"><small>Active</small></span>';
                }else{
                    return '<span class="badge badge-soft-dark"><small>InActive</small></span>';
                }
            })
            ->addColumn('roles',function($user){
                $roles = $user->roles;
                $perm = '';
                if($roles){
                    foreach($roles as $role){
                        $perm = $perm. '<div class="badge badge-soft-info mr-1" >'. $role->name .'</div>';
                    };
                }

                return $perm;//$permission;
            })
            ->editColumn('role',function(User $user){
                return '<span class="badge badge-soft-info">'.ucfirst($user->role).'</span>';
            })

            // ->addColumn('status',function(User $user){
            //     if($user->status == true){
            //         return '<a href="'.route('subscribe.edit',$subscription->id).'" class="badge badge-soft-success"><small>Active</small></a>';
            //     }else{
            //         return '<a href="'.route('subscribe.edit',$subscription->id).'" class="badge badge-soft-dark"><small>InActive</small></a>';
            //     }
            // })
            ->addColumn('action',function($data){
                $link = '<div class="d-flex">'.
                            '<a href="'.route('user.edit',$data->id).'" class="badge badge-soft-primary mr-2"><small>Edit</small></a>'.
                            '<a href="javascript:void(0);" id="'.$data->id.'" class="badge badge-soft-danger delete"><small>Delete</small></a>'.
                        '</div>';
                return $link;
            })
            ->rawColumns(['action','status','name','username','type','roles','role'])
            ->make(true);


        }



        return view('admin.pages.user.user');

    }

    public function create()
    {
        $roles = Role::get();
        $corporates = Corporate::orderby('created_at','desc')->get();
        return view('admin.pages.user.user_add')->with('roles',$roles)->with('corporates',$corporates);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validate = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
        ]);

        $user = New User;
        $user->firstName = $request->firstname;
        $user->lastName = $request->lastname;
        $user->userName = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->role = $request->role;
        $user->save();

        $user->syncRoles($request->roles);


        return redirect()->route('user.index')
        ->with([
            'message'    =>'User Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return response()->json($user);
    }

    public function edit(User $user)
    {

        $roles = Role::get();
        $corporates = Corporate::orderby('created_at','desc')->get();

        //return response()->json($user);

        return view('admin.pages.user.user_edit')->with('roles',$roles)->with('user',$user)->with('corporates',$corporates);
    }

    public function update(Request $request, User $user)
    {
        //dd($request->all());

        // $validate = $request->validate([
        //     'firstName' => 'required',
        //     'lastName' => 'required',
        // ]);


        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        //$user->email = $request->email;
        $user->status = $request->status;
        //$user->corporate_id = $request->corporate_type;
        //$user->role = $request->role;
        if($request->admin){
            $user->type = 'admin';
        }else{
            $user->type = 'user';
        }

        //subscriptions
        if($request->subscribed){$user->subscribed = true;}else{$user->subscribed = false;}
        $user->subscription_date = $request->subscription_date;
        $user->renew_date = $request->renew_date;
        $user->plan = $request->plan;
        $user->action_count = $request->action_count;
        $user->amount = $request->amount;

        $user->update();

        //$user->syncRoles($request->roles);

        //$user->corporate()->sync($request->corporate_type);

        return redirect()->route('user.index')
        ->with([
            'message'    =>'User Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        $user = User::destroy($id);

        if($user){
            return redirect()->route('user.index')
            ->with([
                'message'    =>'User Updated Successfully',
                'alert-type' => 'success',
            ]);
        }else{

        }

    }
}
