<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Setting;
use App\Admin;
use App\Material;
use App\Summary;
use App\Log;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubAdminController extends Controller {

    function __construct() {
        $this->middleware('auth:admin');
        $this->middleware('admin.type');
    }

    function logout(Request $request) {

        auth('admin')->logout();

        return redirect('/admin-cpx');
    }

    function index() {
        $data['users'] = User::where('id','!=',12)->count();
        $data['material'] = Material::count();
        $data['summaries'] = Summary::count();
        $data['color'] = Setting::find(1);
        return view('admin.home', $data);
    }

    
  

////////////////////////////////////////////
    function adminUsers() {
        $data['admins'] = Admin::where('type',2)->get();
        $data['color'] = Setting::find(1);
        return view('admin.subadminUsers.admins', $data);
    }

    function addAdmin() {
        $data['color'] = Setting::find(1);
        return view('admin.subadminUsers.addAdmin', $data);
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
          $admin->type = 2;
        $admin->save();
        $request->session()->flash('alert-success', 'تمت الاضافة بنجاح');
        return redirect()->back();
    }

    function editAdmin($ad) {
        $data['admin'] = Admin::findorfail($ad);
        $data['color'] = Setting::find(1);
        return view('admin.subadminUsers.updateAdmin', $data);
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
/// Orders

}
