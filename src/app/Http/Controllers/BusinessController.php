<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Dishes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;

class BusinessController extends Controller
{
public function singlebusiness(Business $business){
    return view('main.restaurant',
    ['business'=> $business,
        'dishes'=>Dishes::where('business_id','=', $business->id)->inRandomOrder()->get()]);
}

public function search(Request $request){

    return view('main.products',[
        'city'=>$request->city,
//
        'restaurants'=>  Business::whereHas('categories', function($q) use ($request){
            $q->where('categories_id', '=', $request['category']);
        })->where('city','=',$request->city)->get()
    ]);
}

    public function searchCity(Request $request){

        return view('main.products',[
            'city'=>$request->city,

            'restaurants'=>  Business::where('city','=',$request->city)->get()
        ]);



    }


    public function businessmanage(){
    return view('business.restaurantmanage');
    }

    public function businessmanagestore(Request $request){
    $field = [];
        if ($request->hasFile('mainimage') ){
            $request->validate(['mainimage'=>['required','mimes:png,jpg,jpeg', 'max:5120']]);
            $field['mainimage'] = $request->file('mainimage')->store('logos', 'public');
        }

        if ($request->hasFile('header') ){
            $request->validate(['header'=>['required','mimes:png,jpg,jpeg', 'max:5120']]);
            $field['header'] = $request->file('header')->store('logos', 'public');
        }

        $bus = auth()->user()->business()->get('id')->first()->id;

        Business::find($bus)->update($field);
        return redirect('/business/home')->with('message','Images Updated');
    }

}

