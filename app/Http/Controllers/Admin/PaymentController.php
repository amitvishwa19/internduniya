<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PaymentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function __construct(){


    }

    public function index(Request $request)
    {


        if ($request->ajax()) {
            $payments = Payment::orderby('created_at','desc')->latest('id');

            return Datatables::of($payments)
            ->editColumn('created_at',function(Payment $payment){
                return $payment->created_at->diffForHumans();
            })
            ->addColumn('action',function($data){
                $link = '<div class="d-flex">'.
                            '<a href="'.route('payment.edit',$data->id).'" class="badge badge-info mr-2"><small>Edit</small></a>'.
                            '<a href="javascript:void(0);" id="'.$data->id.'" class="badge badge-secondary delete"><small>Delete</small></a>'.
                        '</div>';
                return $link;
            })
            ->rawColumns(['action'])
            ->make(true);


        }


        return view('admin.pages.payment.payment');

    }

    public function create()
    {
        return view('admin.pages.payment.payment_add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $payment = New Payment;
        $payment->name = $request->name;
        $payment->save();

        return redirect()->route('payment.index')
        ->with([
            'message'    =>'Payment Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $payment = Payment::findOrFail($id);

        return response()->json($payment);
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);

        //return response()->json($payment);

        return view('admin.pages.payment.payment_edit',compact('payment'));
    }

    public function update(Request $request, $id)
    {

        $validate = $request->validate([
            'name' => 'required'
        ]);

        $payment = Payment::findOrFail($id);
        $payment->name = $request->name;
        $payment->save();

        return redirect()->route('payment.index')
        ->with([
            'message'    =>'Payment Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        $payment = Payment::destroy($id);

        if($payment){
            return redirect()->route('payment.index')
            ->with([
                'message'    =>'Payment Updated Successfully',
                'alert-type' => 'success',
            ]);
        }else{

        }

    }
}
