<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create(Request $request){
        $email = $request->input('email');

        $customer = Customer::whereEmail($email)->first();

        // If the customer doesn't exist we create it
        if(empty($customer)) {
            $customer = Customer::create($request->all());
        }

        if($request->is("api/*")) {
            return $customer;
        }
        else {
            session()->flash('success', 'Customer created');

            return back();
        }
    }

    public function delete($id){
        $customer = Customer::find($id);

        if(empty($customer))
            abort(404);

        $customer->delete();

        $name = "$customer->first_name $customer->last_name";

        session()->flash('success', "Customer $name was deleted");

        return back();
    }
}
