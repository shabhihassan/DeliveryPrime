<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Business;
use App\Models\Categories;
use App\Models\Dishes;
use App\Models\Roles;
use App\Models\Users;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Session;
use Illuminate\Validation\Rule;

class UserController extends Controller
{


    public function authenticate(Request $request)
    {
        $fields = $request->validate([
            'username' => ['required', Rule::exists('users', 'username')],
            'password' => 'required|min:6'
        ]);
        $pt = Session::get('redirectpath');
        error_log($pt);

        if (auth()->attempt($fields)) {
            $request->session()->regenerate();
            if (auth()->user()->role()->first('name')->name == 'Business') {
                return redirect('/business/home');
            } elseif (auth()->user()->role()->first('name')->name == 'Admin') {
                return redirect('/admin/home');
            } else {
                if($pt == '/checkout'){
                    return redirect('/checkout');
                }else{
                    return redirect('/customer/home');
                }
            }

        } else {
            return back()->withErrors([
                'username' => 'Invalid Login Credentials'
            ]);
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }



    # Admin


    public function AdminHome()
    {
        return view('admin.home',[
            'orders'=> Bill::limit(3)->orderby('id','DESC')->get()
        ]);
    }

    public function adminRegsiter()
    {
        return view('admin.addadmin');
    }

    public function manageAdmins()
    {
        return view('admin.manageadmins', [
            'admins' => Users::where('roles_id', '=', '1')->get(['id', 'name', 'email', 'username'])

        ]);
    }

    public function adminStore(Request $request){
        $field = $request->validate([
            'name' => 'required',
            'username' => ['required', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
            'contact' => ['required', 'min:10'],


        ]);

        $field['password'] = bcrypt($field['password']);

        $user = Users::create([
            'name' => $field['name'],
            'username' => $field['username'],
            'email' => $field['email'],
            'password' => $field['password'],
            'contactnumber' => $field['contact'],
            'roles_id' => Roles::where('name', '=', 'Admin')->first('id')['id'],

        ]);
        return redirect('/admin/manageadmins')->with('message','Admin Created Successfully');
    }

    public function adminDelete(Users $users)
    {

        $users->delete();
        return response('Deleted Successfully', 200);
    }












    # Admin End


    # Restaurant Manager

    public function businessRegister()
    {
        return view('business.register');
    }

    public function businessStore(Request $request)
    {
//        dd($request);
        $field = $request->validate([
            'name' => 'required',
            'username' => ['required', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
            'business' => ['required'],
            'address' => 'required',
            'contact' => ['required', 'min:10'],
            'location' => ['required'],
            'categories'=>['required']


        ]);
        $cat = Categories::find($field['categories']);


        $field['password'] = bcrypt($field['password']);

        $user = Users::create([
            'name' => $field['name'],
            'username' => $field['username'],
            'email' => $field['email'],
            'password' => $field['password'],
            'contactnumber' => $field['contact'],
            'roles_id' => Roles::where('name', '=', 'Business')->first('id')['id'],

        ]);
        $busn = new Business();
        $busn->user_id = $user->id;
        $busn->business_name = $field['business'];
        $busn->city = $field['location'];
        $busn->address = $field['address'];
        $busn->is_Verified = false;
        $busn->save();
        $busn->categories()->attach($cat);

//        Business::create([
//            'user_id' => $user->id,
//            'business_name' => $field['business'],
//            'city' => $field['location'],
//            'address' => $field['address'],
//            'is_Verified' => false
//        ]);

        auth()->login($user);

        event(new Registered($user));

        return redirect('/');
    }

    public function Login(Request $request)
    {

        return view('main.login', ['type' => $request['type']]);

    }

    public function businessHome()
    {
        return view('business.home',[
            'orders'=> Bill::where('business_id','=', auth()->user()->business()->get('id')->first()->id)->limit(3)->get()
        ]);
    }

    public function businessDishes()
    {

        return view('business.dishes', [
            'dishes' => Dishes::where('business_id', '=', auth()->user()->business()->get('id')->first()->id)->get()
        ]);
    }


    public function allbusiness(){

        return view('admin.business', [
            'businesses'=> Business::all()
        ]);
    }
    # End Restaurant


    # Customer
    public function customerHome()
    {
        return view('customer.home',[
            'orders'=> Bill::where('user_id','=', auth()->user()->id)->limit(3)->orderby('id','DESC')->get()
        ]);
    }

    public function customerregiter(){
        return view('customer.register');
    }

    public function customerstore(Request $request){
        $field = $request->validate([
            'name' => 'required',
            'username' => ['required', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
            'contact' => ['required', 'min:10'],



        ]);



        $field['password'] = bcrypt($field['password']);

        $user = Users::create([
            'name' => $field['name'],
            'username' => $field['username'],
            'email' => $field['email'],
            'password' => $field['password'],
            'contactnumber' => $field['contact'],
            'roles_id' => Roles::where('name', '=', 'Customer')->first('id')['id']




        ]);
        auth()->login($user);

        event(new Registered($user));

        return redirect('/customer/home');
    }


    public function checkout(){
return view('main.checkout');
    }

    public function checkoutstore(Request $request){

        $field = $request->validate([
            'address'=> 'required',
            'city'=> 'required',
            'paymentMethod' => 'required',
            'businessid' => 'required',
            'cart'=>'required'


        ]);
        $subtotal = 0;
        $products = [];

        $field['cart'] =  json_decode(stripslashes(implode(",",$field['cart'])), true);
foreach ($field['cart'] as $item){

    $prod = Dishes::find($item['id']);

    array_push($products,[$prod->id, $item['qty']] );
    $subtotal += ($prod->cost * $item['qty']);

}
$total = ($subtotal*0.17) + $subtotal;

$bill = new Bill();
$bill->business_id = $field['businessid'];
$bill->user_id = auth()->id();
$bill->subtotal = $subtotal;
$bill->total = $total;
$bill->address = $field['address'];
$bill->Status = 'Pending';

$bill->save();

foreach ($products as $a){
    $bill->dishes()->attach($a[0], ['quantity'=>$a[1]]);
}


        return redirect('/');
    }




    # End Customer


}
