<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        return Customer::paginate(15);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'max_debt' => 'required',
            'note' => ''
        ]);
 
        $NewCustomer = Customer::create($request->all());
        return  response()->json($NewCustomer , 201) ;
    }
    public function show($id)
    {
        return Customer::findOrFail($id);
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'max_debt' => 'required',
            'note' => ''
        ]);
        $customer->update($request->all());
        return $customer;
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json(['deleting'=>'true']);
    } 

    public function search(Request $request )
    {
        $request->validate([
            'name'=>'required'
        ]);
        $name = $request->name;
        return Customer::where('name','like','%' . $name . '%')->paginate(15);
    }


    
}
