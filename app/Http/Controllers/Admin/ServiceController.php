<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Setting;
use Auth;

class ServiceController extends Controller {

    function __construct() {
        $this->middleware('auth:admin');

      
    }

    ////index
    public function index() {
        $data['color'] = Setting::find(1);
        
       if(Auth::user()->type==1){
   $data['services'] = Service::orderby('id', 'desc')->get();}
 else {
     
   $data['services'] = Service::where('branch',Auth::user()->branch)->orderby('id', 'desc')->get();
 }
        return view('admin.service.services', $data);
    }

    ////add service
    public function create() {

        $data['color'] = Setting::find(1);
        return view('admin.service.addService', $data);
    }

    public function store(Request $request) {


        $this->validate($request, [
            'title' => 'required',
            'title_e' => 'required',
            'desc' => 'required',
            'endesc' => 'required',
        ]);

        $service = new Service();
        $service->title = $request->title;
        $service->title_e = $request->title_e;
        $service->descriptione = $request->desc;
        $service->descriptione_en = $request->endesc;
        $service->branch = $request->branch;
        $service->save();
        //



        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////update  service
    public function edit($id) {
        $data['service'] = Service::findorfail($id);
        $data['color'] = Setting::find(1);
        return view('admin.service.updateService', $data);
    }

    public function update(Request $request, $id) {


        $this->validate($request, [
            'title' => 'required',
            'title_e' => 'required',
            'desc' => 'required',
            'endesc' => 'required',
        ]);

        $service = Service::findorfail($id);
        $service->title = $request->title;
        $service->title_e = $request->title_e;
        $service->descriptione = $request->desc;
        $service->descriptione_en = $request->endesc;
        $service->branch = $request->branch;
        $service->update();
        //


        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////delete  service
    public function destroy(Request $request, $id) {

        $service = Service::findorfail($id);
        $service->delete();
    }

}
