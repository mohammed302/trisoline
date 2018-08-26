<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;
use App\Setting;
use Auth;

class PageController extends Controller
{
    function __construct() {
        $this->middleware('auth:admin');
        $this->middleware('admin.type');
    }
    ////update  tag
    public function edit($id)
    {
        $data['page'] =  Page::findorfail($id);
        $data['color'] = Setting::find(1);
        return view('admin.page.updatePage', $data);
    }

    public function update(Request $request, $id)
    {


        $this->validate($request, [
            'desc' => 'required',
        ]);

        $page = Page::findorfail($id);
        $page->descriptione = $request->desc;
        $page->descriptione_en=$request->endesc;
        $page->update();



        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();

    }

}
