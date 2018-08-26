<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clinet_product;
use App\Client_order;
use App\Setting;
use Auth;
use Image;

class  ClinetProductController extends Controller {

    function __construct() {
        $this->middleware('auth:admin');
    }

    ////index
    public function index() {
        $data['color'] = Setting::find(1);
      
            $data['products'] =  Clinet_product::orderby('id', 'desc')->get();
      

        

        return view('admin.client_product.products', $data);
    }

    ////add product
    public function create() {

        $data['color'] = Setting::find(1);
        return view('admin.product.add Clinet_product', $data);
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

        $product = new  Clinet_product();
        $product->title = $request->title;
        $product->title_e = $request->title_e;
        $product->description = $request->desc;
        $product->description_e = $request->endesc;
        $product->branch = $request->branch;
        $product->img = implode("|", $images); //$input['imagename'];
        $product->save();




        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////update  product
    public function edit($id) {
        $data['product'] =  Clinet_product::findorfail($id);
        $data['color'] = Setting::find(1);
        return view('admin.client_product.updateProduct', $data);
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


        $product =  Clinet_product::findorfail($id);
        $product->title = $request->title;
        $product->title_e = $request->title_e;
        $product->description = $request->desc;
        $product->description_en = $request->endesc;
     
        if ($request->imgPath != null) {
            $old=    $product->img ;
       
           // exit;
            $product->img =    $old.'|'. implode("|", $images);
           
        }
        
        $product->update();




        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////delete  product
    public function destroy(Request $request, $id) {
        Client_order::where('work_id',$id)->delete();
        $product =  Clinet_product::findorfail($id);
        $product->delete();
    
    }
//
     ////accept  product
    public function accept($id) {
       $product =  Clinet_product::findorfail($id);
       $product->status=1;
       $product->save();
    
       
    }
    
      ////reject  product
    public function reject($id) {
       $product =  Clinet_product::findorfail($id);
       $product->status=2;
       $product->save();
    
       
    }
}
