<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Setting;
use Auth;
use Image;

class NewsController extends Controller
{
   function __construct() {
        $this->middleware('auth:admin');
       $this->middleware('admin.type');
    }

    ////index
    public function index() {
        
        $data['color'] = Setting::find(1);
        $data['news'] = News::orderby('id', 'desc')->get();

        return view('admin.news.news', $data);
    }

    ////add News
    public function create() {

        $data['color'] = Setting::find(1);
        return view('admin.news.addNews', $data);
    }

    public function store(Request $request) {


        $this->validate($request, [
            'imgPath' => 'required',
            'title' => 'required',
            'title_e' => 'required',
            'desc' => 'required',
            'endesc' => 'required',
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



        $news = new News();
        $news->title = $request->title;
        $news->title_e = $request->title_e;
        $news->description = $request->desc;
        $news->description_e = $request->endesc;
        $news->img = $input['imagename'];
        $news->save();




        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////update  news
    public function edit($id) {
        $data['news'] = News::findorfail($id);
        $data['color'] = Setting::find(1);
        return view('admin.news.updateNews', $data);
    }

    public function update(Request $request, $id) {


        $this->validate($request, [
         
            'title' => 'required',
            'title_e' => 'required',
            'desc' => 'required',
            'endesc' => 'required',
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


        $news = News::findorfail($id);
        $news->title = $request->title;
        $news->title_e = $request->title_e;
        $news->description = $request->desc;
        $news->description_e = $request->endesc;
        if ($request->imgPath != null) {
            $news->img = $input['imagename'];
        }
        $news->update();




        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////delete  news
    public function destroy(Request $request, $id) {

        $news = News::findorfail($id);
        $news->delete();
    }

}
