<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Setting;
use App\Admin;
use App\Material;
use App\Summary;
use App\Log;
use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller {

    function __construct() {
        $this->middleware('auth:admin');
     
    }

////////////////////////////////////////////
    function adminUsers() {
         if(Auth::user()->type==1){
       $data['admins'] = Admin::where('type', 3)->orderby('id', 'desc')->get();}
 else {
     
   $data['admins'] = Admin::where('branch',Auth::user()->branch)->where('type', 3)->orderby('id', 'desc')->get();
 }
        
        $data['color'] = Setting::find(1);
        return view('admin.employee.emps', $data);
    }

    function addAdmin() {
        $data['color'] = Setting::find(1);
        $data['departments'] = Department::all();

        return view('admin.employee.addEmp', $data);
    }

    function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:204|unique:admins',
            'password' => 'required|min:6|',
            'email' => 'required|min:6|unique:admins',
        ]);
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->pass = $request->password;
        $admin->branch = $request->branch;
        $admin->department = $request->department;

        $admin->type = 3;
        $admin->save();
        $request->session()->flash('alert-success', 'تمت الاضافة بنجاح');
        return redirect()->back();
    }

    function editAdmin($ad) {
        $data['admin'] = Admin::findorfail($ad);
        $data['color'] = Setting::find(1);
        $data['departments'] = Department::all();
        return view('admin.employee.updateEmp', $data);
    }

    function update(Request $request, $ad) {
        $this->validate($request, [
            'name' => 'required|max:204|unique:admins,name,' . $ad,
            'password' => 'required|min:6|',
            'email' => 'required|min:6|unique:admins,email,' . $ad,
        ]);
        $admin = Admin::findorfail($ad);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->pass = $request->password;
        $admin->branch = $request->branch;
        $admin->department = $request->department;
        $admin->update();
        $request->session()->flash('alert-success', 'تم بنجاح');
        return redirect()->back();
    }

    function destroy(Request $request, Admin $admin) {

        if ($admin->delete()) {
            return "delete success";
        } else {
            return "delete failed";
        }
    }

}
