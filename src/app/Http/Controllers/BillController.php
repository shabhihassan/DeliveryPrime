<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Business;
use App\Models\Users;
use Illuminate\Http\Request;

class BillController extends Controller
{
    //
    public function customerorders(){
//        return Bill::find(3)->dishes()->pivot;
        return view('customer.myorders',[
            'orders'=> Bill::where('user_id','=', auth()->user()->id)->get()
        ]);
    }

    public function businessOrders(){


        return view('business.myorders', [
            'orders'=> Bill::where('business_id','=', auth()->user()->business()->get('id')->first()->id)->get()
        ]);
    }

    public function allorders(){


        return view('admin.myorders', [
            'orders'=> Bill::all()
        ]);
    }

    public function updateStatus(Bill $bd){

return view('business.updatestatus',[
    'bill'=> $bd
]);

    }

    public function updateStatusstore(Request $request, Bill $bd){

        $field = $request->validate([
            'name'=> 'required'
        ]);
        $bd->update(['Status'=>$field['name']]);

        return back()->with('message','Status Updated');

    }


    public function billdetails(Bill $bid){

        $details = Bill::with('dishes')->get()->find($bid);


        $user = Users::get()->find($details->user_id);
        $business = Business::get()->find($details->business_id);
        return view('main.billdetails',[
            'details' =>$details,
            'customer'=>$user,
            'business'=>$business
        ]);

    }






}
