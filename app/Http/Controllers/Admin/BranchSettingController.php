<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Setting;
use App\Home_setting;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Controllers\Controller;;

class BranchSettingController extends Controller
{


    function __construct() {
        $this->middleware('auth:admin');
      

    }
    function setting() {
        $data['hsetting'] = Home_setting::find(Auth::user()->branch+1);
        $data['setting'] =Setting::find(1);
        $data['color'] = Setting::find(1);
        return view('admin.updateBranchSetting', $data);
    }

    function updateSetting(Request $request) {
if($request->imgPath!=null){
  $image = $request->file('imgPath');
        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();

        $destinationPath = base_path() . '/img/';

        $img = Image::make($image->getRealPath(), array(
                    'width' => 600,
                    'height' => 600,
                        //  'grayscale' => false
        ));
        // $img->crop(new Point(0, 0), new Box(45, 45));
        $img->save($destinationPath . '/' . $input['imagename']);

        $destinationPath = base_path() . '/img/thumbnail';

        $image->move($destinationPath, $input['imagename']);
}
if($request->imgPath2!=null){
  $image = $request->file('imgPath2');
        $input['imagename2'] = time() . '.' . $image->getClientOriginalExtension();

        $destinationPath = base_path() . '/img/';

        $img = Image::make($image->getRealPath(), array(
                    'width' => 600,
                    'height' => 600,
                        //  'grayscale' => false
        ));
        // $img->crop(new Point(0, 0), new Box(45, 45));
        $img->save($destinationPath . '/' . $input['imagename2']);

        $destinationPath = base_path() . '/img/thumbnail';

        $image->move($destinationPath, $input['imagename2']);
}

        $setting = Home_setting::find(Auth::user()->branch+1);
        $setting->service1 = $request->service1;
        $setting->service1_desc = $request->service1_desc;
        $setting->service2 = $request->service2;
        $setting->service2_desc = $request->service2_desc;
        $setting->service3 = $request->service3;
        $setting->service3_desc = $request->service3_desc;
        $setting->service1e = $request->service1e;
        $setting->service1e_desc = $request->service1e_desc;
        $setting->service2e = $request->service2e;
        $setting->service2e_desc = $request->service2e_desc;
        $setting->service3e = $request->service3e;
        $setting->service3e_desc = $request->service3e_desc;
        $setting->address1 = $request->address1;
        $setting->address1e = $request->address1e;
        $setting->Latitude= $request->Latitude;
        $setting->longitude= $request->longitude;
        $setting->tel3=$request->tel3;
if($request->imgPath!=null){
  $setting->img1 = $input['imagename'];
}
if($request->imgPath2!=null){
  $setting->img2 = $input['imagename2'];
}
        $setting->update();
        $request->session()->flash('alert-success', 'تم بنجاح');
        return redirect()->back();
    }
}
