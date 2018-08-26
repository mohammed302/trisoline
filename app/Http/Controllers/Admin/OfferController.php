<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Offer;
use App\Setting;
use Auth;
use Image;

class OfferController extends Controller
{
  function __construct() {
        $this->middleware('auth:admin');
    }

    ////index
    public function index() {
        
        $data['color'] = Setting::find(1);
        if(Auth::user()->type==1){
        $data['offers'] = Offer::orderby('id', 'desc')->get();}
        else{
          $data['offers'] = Offer::where('branch',Auth::user()->branch)->orderby('id', 'desc')->get();   
            
        }

        return view('admin.offer.offers', $data);
    }

    ////add offer
    public function create() {

        $data['color'] = Setting::find(1);
        return view('admin.offer.addOffer', $data);
    }

    public function store(Request $request) {


        $this->validate($request, [
            'imgPath' => 'required',
            'title' => 'required',
            'title_e' => 'required',
        
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



        $offer = new Offer();
        $offer->title = $request->title;
        $offer->title_e = $request->title_e;
        $offer->branch=$request->branch;
        $offer->img = $input['imagename'];
        $offer->save();




        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////update  Offer
    public function edit($id) {
        $data['offer'] = Offer::findorfail($id);
        $data['color'] = Setting::find(1);
        return view('admin.offer.updateOffer', $data);
    }

    public function update(Request $request, $id) {


        $this->validate($request, [
         
            'title' => 'required',
            'title_e' => 'required',
          
        ]);
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


        $offer = Offer::findorfail($id);
        $offer->title = $request->title;
        $offer->title_e = $request->title_e;
        $offer->branch=$request->branch;
        if ($request->imgPath != null) {
            $offer->img = $input['imagename'];
        }
        $offer->update();




        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////delete  Offer
    public function destroy(Request $request, $id) {

        $offer = Offer::findorfail($id);
        $offer->delete();
    }

}
