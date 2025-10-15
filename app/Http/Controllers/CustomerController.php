<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerController extends Controller
{
    public function CreateView(){
        return view ("customer.create");
    }
    public function AddCustomer(Request $request){
        $validation = $request->validate(
            [
                "name" => "required|string",
                "phone" => "required|integer",
                "address" => "required|string",
                "cnic" => "required|string|unique:customers"
            ]
            );

            $data = Customer::create($request->all());

            if($data){
                return redirect()->route("ListView")->with("success", "Data Added Successfully");
            }
    }
    public function ShowData(){
        $customers = Customer::all();
        return view("customer.list",compact("customers"));
    }
    public function DeleteData($id){
        $customer = Customer::find($id);
        $data = $customer->delete();
        if($data){
            return redirect()->route("ListView")->with("success","Data Deleted Successfully");
        }
    }
    public function edit($id){
        $customers = Customer::find($id);
        return view("customer.edit",compact("customers"));
    }
    public function update(Request $request, $id){
        $validation = $request->validate(
            [
            "name" => "required|string",
            "phone" => "required|integer",
            "address" => "required|string",
            "cnic" => "required|string|unique:customers"
            ]
            );
            $data = Customer::find($id);
            $abc = $data->update($request->all());
              if($abc){
                return redirect()->route("ListView")->with("success", "Data Updated Successfully");
            }
    }

    public function Trashed(){
        $customers = Customer::onlyTrashed()->get();
        return view ("customer.trash", compact("customers"));
    }
    public function ForceDelete($id){
        $customer = Customer::withTrashed()->find($id);
        $data = $customer->forceDelete();
        if ($data){
            return redirect()->route("trashedContent")->with("success","Data Deleted Successfully");
        }
    }
    public function RestoreData($id){
        $customer = Customer::withTrashed()->find($id);
        $data = $customer->restore();
        if($data){
            return redirect()->route("ListView")->with("success","Data Restored Successfully");
        }
    }
}
