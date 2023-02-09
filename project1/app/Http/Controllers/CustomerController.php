<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class CustomerController extends Controller
{
    public function index()
    {
        $url = url('/insert');
        $customers = customer::all();
        $data = compact('customers', 'url');
        return view('insertform')->with($data);
    }

    public function relation(){
        //return Product::find(3)->getCustomer;
        return customer::find(12)->getProduct;
    }

    public function store(Request $request)
    {

        $customer = new customer;
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->phone = $request['phone'];
        $customer->city = $request['city'];
        $customer->dob = $request['dob'];
        $customer->password = md5($request['password']);
        $customer->save();
        return redirect('/view');

    }

    public function addProduct(Request $request){
        $product = new Product;
        $product->product_name = $request['name'];
        $product->customer_id = $request['customer_id'];
        $product->save();
        return redirect('/view');
    }

    public function view()
    {
        $customers = customer::all();
        $data = compact('customers');
        return view('insertform')->with($data);
    }

    public function delete($id)
    {
        customer::find($id)->delete();
        return redirect()->back();
    }

    public function forceDelete($id)
    {
        customer::onlyTrashed()->find($id)->forceDelete();
        return redirect('/view');
    }

    public function update($id)
    {

        $customer = customer::find($id);
        $data = compact('customer');
        return view('updatecustomer')->with($data);
    }

    public function edit(Request $request, $id)
    {
        $customer = customer::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->phone = $request['phone'];
        $customer->city = $request['city'];
        $customer->dob = $request['dob'];
        $customer->save();
        return redirect('/view');
    }


    //for redirecting the view page with the trashed records...
    public function restoredata()
    {
        $deleteddata = customer::onlyTrashed()->get();
        $countdata = $deleteddata->count();
        if ($countdata > 0)
            return view('restoreview', compact('deleteddata'));
        else
            return redirect()->back()->with('error', 'No Records Found..!!');
    }

    // restoring particular record...
    public function restore($id)
    {

        customer::withTrashed()->find($id)->restore();
        return redirect('/view');
    }



    function restoreAll()
    {
        customer::withTrashed()->restore();
        return redirect('/view');
    }

    function forceAll()
    {
        customer::onlyTrashed()->forceDelete();
        return redirect('/view');
    }

    function deleteAll()
    {
        $cust = customer::withTrashed()->delete();
        return redirect()->back();
    }

    public function show()
    {
        $customer = '';
        // $customer = DB::table('customers')->first();
        // $customer = DB::table('customers')->where('city', 'Haagmouth')->value('name');
        // $customer = DB::table('customers')->find(10);
       // $customer = DB::table('customers')->pluck('name','city');
        // $customer = DB::table('customers')->orderBy('id')->chunk(15,function
        //     ($customer){
        //         echo "<br>";
        //         foreach($customer as $cst){
        //         echo $cst->name;
        //         echo "<br>";
        //         }
        // });

        //Agregates

        // $customer = DB::table('customers')->count();

        //  $customer = DB::table('customers')->max('dob');
        //  $customer = DB::table('customers')->min('dob');
        //  $customer = DB::table('customers')->max('phone');
        //  $customer = DB::table('customers')->min('phone');

        // $customer = DB::table('customers')->where('city', 'Haagmouth')->exists();
        // if($customer){
        //     dd('Yes');
        // }
        // else{
        //     dd('No');
        // }

        // $customer = DB::table('customers')->select('id','name', 'email')->get();
        // $customer = DB::table('customers')->select('id','name','email')->where('id','>','4')->where('id','<','10')->get();
        // $customer = DB::table('customers')->select('id','name','email')->where('name','like','g%')->get();
        // $customer = DB::table('customers')->select('id','name','email')->where('name','like','g%')->orWhere('name','like','d%')->get();
        // $customer = DB::table('customers')->select('id', 'name', 'dob')->whereDate('dob', '1992-12-10')->get();
        // $customer = DB::table('customers')->select('id', 'name', 'dob')->whereMonth('dob', '05')->get();
            // $customer = DB::table('customers')->select()->whereDay('dob', '30')->get();
        // $customer = DB::table('customers')->select('id', 'name')->orderBy('id','desc')->get();
        // $customer = DB::table('customers')->select('id', 'name')->orderBy('id','desc')->limit(10)->get();
        // $customer = DB::table('customers')->select('id', 'name')->latest('id')->limit(1)->get();
        // $customer = DB::table('customers')->select('id', 'name')->oldest('id')->limit(1)->get();
        // $customer = db::table('customers')->select('id','name')->inRandomOrder()->get()->last();
        // $customer = db::table('customers')->select('id', 'name')->groupBy('id')->having('id','>','197')->get();
        // $customer = DB::table('customers')->select('id', 'name')->skip(6)->take(4)->get();
        // $customer = DB::table('customers')->select('id', 'name')->offset(5)->limit(10)->get();
        


        // DB::table('customers')->insert([
        //     'name' => 'Gaurav',
        //     'email' => 'gaurav@gmail.com',
        //     'city' => 'rajkot',
        //     'dob' => '2001-05-16',
        //     'phone' => '8780478205',
        //     'password' => 'abcd'
        // ]);
        // DB::table('customers')->where('id', '234')->update(
        //     [
        //         'name' => 'Akshar',
        //         'email' => 'akshar@gmail.com',
        //         'city' => 'gandhinagar',
        //         'dob' => '2009-01-24',
        //         'phone' => '8000768205',
        //         'password' => 'oooo'
        //     ]
        // );

        // DB::table('customers')->where('name', 'Akshar')->update(
        //     [
        //         'city' => 'Rajkot',
        //         'dob' => '2005-04-03'
        //     ]
        // );
        //$customer = DB::table('customers')->select()->latest('id')->get()->first();
        //$customer = DB::table('customers')->select()->latest('id')->get()->last();
        // dd($customer);

        // $id = DB::table('customers')->insertGetId([
        //     'name' => 'asdasd',
        //     'email' => 'gasdash@gh.com',
        //     'city' => 'amdsdas',
        //     'dob' => '2001-05-11',
        //     'phone' => '8780172205',
        //     'password' => 'ab2d'
        // ]);
        // dd($id);
    }
}
