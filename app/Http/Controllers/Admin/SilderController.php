<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use App\Setting;
use Auth;
use Image;

class SilderController extends Controller
{
     function __construct() {
        $this->middleware('auth:admin');
    }

    ////index
    public function index() {
        $data['color'] = Setting::find(1);
        if(Auth::user()->type==1){
        $data['sliders'] = Slider::orderby('id', 'desc')->get();}
 else {
     
   $data['sliders'] = Slider::where('branch',Auth::user()->branch)->orderby('id', 'desc')->get();
 }

        return view('admin.slider.sliders', $data);
    }

    ////add slider
    public function create() {

        $data['color'] = Setting::find(1);
        return view('admin.slider.addSlider', $data);
    }

    public function store(Request $request) {


        $this->validate($request, [
            'imgPath' => 'required',
            
        ]);
        $image = $request->file('imgPath');

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

        $image->move($destinationPath, $input['imagename']);



        $slider = new Slider();
        $slider->branch = $request->branch;
        $slider->img = $input['imagename'];
        $slider->save();




        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////update  slider
    public function edit($id) {
        $data['slider'] = Slider::findorfail($id);
        $data['color'] = Setting::find(1);
        return view('admin.slider.updateSlider', $data);
    }

    public function update(Request $request, $id) {


       
        if ($request->imgPath != null) {
            $image = $request->file('imgPath');

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

            $image->move($destinationPath, $input['imagename']);
        }


        $slider = Slider::findorfail($id);
        $slider->branch = $request->branch;
        if ($request->imgPath != null) {
            $slider->img = $input['imagename'];
        }
        $slider->update();




        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////delete  slider
    public function destroy(Request $request, $id) {

        $slider = Slider::findorfail($id);
        $slider->delete();
    }
}
