<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;
use App\Setting;


class DepartmentController extends Controller
{
       function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin.type');
    }

    ////index
    public function index()
    {
        $data['color'] = Setting::find(1);
        $data['departments'] = Department::withCount('emp')->orderby('id', 'desc')->get();

        return view('admin.department.departments', $data);
    }

    ////add Department
    public function create()
    {

        $data['color'] = Setting::find(1);
        return view('admin.department.addDepartment', $data);
    }

    public function store(Request $request)
    {


        $this->validate($request, [
            'name' => 'required',
          
        ]);

       $department = new Department();
        $department->name = $request->name;
     
        $department->save();
        //



        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();

    }

    ////update  Department
    public function edit($id)
    {
        $data['department'] = Department::findorfail($id);
        $data['color'] = Setting::find(1);
        return view('admin.department.updateDepartment', $data);
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
          
        ]);

        $department = Department::findorfail($id);
        $department->name = $request->name;
       
        $department->update();


        //


        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();

    }

    ////delete  Department
    public function destroy(Request $request, $id)
    {

        $service = Department::findorfail($id);
        $service->delete();


    }
}
