<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Work;
use App\Setting;
use Auth;
use Image;

class WorkController extends Controller {

    function __construct() {
        $this->middleware('auth:admin');
    }

    ////index
    public function index() {
        $data['color'] = Setting::find(1);
        if (Auth::user()->type == 1) {
            $data['works'] = Work::where('branch',3)->orderby('id', 'desc')->get();
        } else {

            $data['works'] = Work::where('branch', Auth::user()->branch)->orderby('id', 'desc')->get();
        }

        return view('admin.work.works', $data);
    }

    ////add work
    public function create() {

        $data['color'] = Setting::find(1);
        return view('admin.work.addWork', $data);
    }

    public function store(Request $request) {


        $this->validate($request, [
            'imgPath' => 'required',
            'title' => 'required',
            'title_e' => 'required',
            'desc' => 'required',
            'endesc' => 'required',
        ]);
      
        $images = array();
        if ($files = $request->file('imgPath')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                //  $name=  time() . '.' . $file->getClientOriginalExtension();
                $file->move('img', $name);
                $images[] = $name;
            }
        }

        $work = new Work();
        $work->title = $request->title;
        $work->title_e = $request->title_e;
        $work->description = $request->desc;
        $work->description_e = $request->endesc;
        $work->branch = $request->branch;
        $work->img = implode("|", $images); //$input['imagename'];
        $work->save();




        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////update  work
    public function edit($id) {
        $data['work'] = Work::findorfail($id);
        $data['color'] = Setting::find(1);
        return view('admin.work.updateWork', $data);
    }

    public function update(Request $request, $id) {


        $this->validate($request, [

            'title' => 'required',
            'title_e' => 'required',
            'desc' => 'required',
            'endesc' => 'required',
        ]);
          
        if ($request->imgPath != null) {
            print_r($request->imgPath);
           // exit;
            $images = array();
            if ($files = $request->file('imgPath')) {
                foreach ($files as $file) {
                    $name = $file->getClientOriginalName();
                    //  $name=  time() . '.' . $file->getClientOriginalExtension();
                    $file->move('img', $name);
                    $images[] = $name;
                }
            }
        }


        $work = Work::findorfail($id);
        $work->title = $request->title;
        $work->title_e = $request->title_e;
        $work->description = $request->desc;
        $work->description_e = $request->endesc;
        $work->branch = $request->branch;
        if ($request->imgPath != null) {
            $old=    $work->img ;
       
           // exit;
            $work->img =    $old.'|'. implode("|", $images);
           
        }
        
        $work->update();




        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////delete  work
    public function destroy(Request $request, $id) {

        $work = Work::findorfail($id);
        $work->delete();
    }
      public function deleteimg($image,Request $req){
         $product=Work::findorfail($req['post_id']);
         $images=explode('|', $product->img);
         if (($key = array_search($image, $images)) !== false) {
           unset($images[$key]);
           }
         $product->img=implode("|", $images);
         $product->save();
         $req->session()->flash('alert-success', 'تم التعديل  بنجاح  ');
         return redirect()->back();
}
}
