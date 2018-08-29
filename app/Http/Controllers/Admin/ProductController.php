<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Setting;
use Auth;
use Image;

class ProductController extends Controller {

    function __construct() {
        $this->middleware('auth:admin');
    }

    ////index
    public function index() {
        $data['color'] = Setting::find(1);
        if (Auth::user()->type == 1) {
            $data['products'] = Product::orderby('id', 'desc')->get();
        } else {

            $data['products'] = Product::where('branch', Auth::user()->branch)->orderby('id', 'desc')->get();
        }

        return view('admin.product.products', $data);
    }

    ////add product
    public function create() {

        $data['color'] = Setting::find(1);
        return view('admin.product.addProduct', $data);
    }

    public function store(Request $request) {


        $this->validate($request, [
            'imgPath' => 'required',
            'title' => 'required',
            'title_e' => 'required',
            'desc' => 'required',
            'endesc' => 'required',
        ]);
        /* $image = $request->file('imgPath');

          $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();

          $destinationPath = base_path() . '/img/';

          $img = Image::make($image->getRealPath(), array(
          'width' => 300,
          'height' => 300,
          //  'grayscale' => false
          ));
          // $img->crop(new Point(0, 0), new Box(45, 45));
          $img->save($destinationPath . '/' . $input['imagename']);

          $destinationPath = base_path() . '/img/thumbnail';

          $image->move($destinationPath, $input['imagename']); */
        $images = array();
        if ($files = $request->file('imgPath')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                //  $name=  time() . '.' . $file->getClientOriginalExtension();
                $file->move('img', $name);
                $images[] = $name;
            }
        }


        $product = new Product();
        $product->title = $request->title;
        $product->title_e = $request->title_e;
        $product->description = $request->desc;
        $product->description_e = $request->endesc;
        $product->branch = $request->branch;
        $product->img = implode("|", $images);
        $product->save();




        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////update  product
    public function edit($id) {
        $data['product'] = Product::findorfail($id);
        $data['color'] = Setting::find(1);
        return view('admin.product.updateProduct', $data);
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
          //  exit;
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


        $product = Product::findorfail($id);
        $product->title = $request->title;
        $product->title_e = $request->title_e;
        $product->description = $request->desc;
        $product->description_e = $request->endesc;
        $product->branch = $request->branch;
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

        $product = Product::findorfail($id);
        $product->delete();
    }
    
        public function deleteimg($image,Request $req){
         $product=Product::findorfail($req['post_id']);
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
