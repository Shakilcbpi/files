<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Product;

class DemoController extends Controller
{
    //

    public function increment(){
        return view('frontEnd.layouts.cartincrement');
    }
       public function increment2(){
        return view('frontEnd.layouts.cart');
    }

    public function employeeList(){
         $employees= Employee::all();
         return view('frontEnd.layouts.employee',compact('employees'));
    }

    public function userCreate(Request $request){
    $validated = $request->validate([
        'name'=>'required|string|max:130',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|string|max10',
        'status'=>'required|string|max10',
    ]);

    $user = User::create($validated);

    return response()->json([
        'message' => 'Success',
        'user' => $user
    ], 201);
}

//     public function show_emp(){
//      $employees = Employee::all();
//      return $employees;
//    }

   
   public function employee_create(Request $request){
      $validated = $request->validate([
        'name'=>'required|string|max:120',
        'email'=>'required|email|unique:employees,email',  
    ]);

    $employee = Employee::create($validated); 

    // return response()->json([
    //     'message' => 'Employee create successfully',
    //     'employee' => $employee
    // ], 200);
    return redirect()->route('employeeList');
}


 public function employee_update(Request $request,$id){
      $validated = $request->validate([
        'name'=>'required|string|max:120',
        'email'=>'required|email|unique:employees,email,'.$id,  
    ]);

    
   $employee = Employee::find($id); 
   if(!$employee){
      return "Employee not found";
   }
    $employee->update($validated);

    // return response()->json([
    //     'message' => 'Employee updated successfully',
    //     'employee' => $employee
    // ], 200);
    return redirect()->route('employeeList');
}


public function employee_delete($id){
     
    
   $employee = Employee::find($id); 
   if(!$employee){
      return "Employee not found";
   }
    $employee->delete();

    // return response()->json([
    //     'message' => 'Employee deleted successfully',
    //     'employee' => $employee
    // ], 200);
    return redirect()->route('employeeList');
}

 
 


}
