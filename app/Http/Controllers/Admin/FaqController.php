<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faq;
use App\Setting;
use Auth;

class FaqController extends Controller
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
        $data['faqs'] = Faq::orderby('id', 'desc')->get();

        return view('admin.faq.faqs', $data);
    }

    ////add Faq
    public function create()
    {

        $data['color'] = Setting::find(1);
        return view('admin.faq.addFaq', $data);
    }

    public function store(Request $request)
    {


        $this->validate($request, [
            'qusation' => 'required',
            'answer' => 'required',
            'qusationen' => 'required',
            'answeren' => 'required',
        ]);

        $faq = new Faq();
        $faq->qusation = $request->qusation;
        $faq->answer = $request->answer;
        $faq->qusation_en = $request->qusationen;
        $faq->answer_en = $request->answeren;
        $faq->save();
        //



        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();

    }

    ////update  Faq
    public function edit($id)
    {
        $data['faq'] =  Faq::findorfail($id);
        $data['color'] = Setting::find(1);
        return view('admin.faq.updateFaq', $data);
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'qusation' => 'required',
            'answer' => 'required',
            'qusationen' => 'required',
            'answeren' => 'required',
        ]);

        $faq =  Faq::findorfail($id);
        $faq->qusation = $request->qusation;
        $faq->answer = $request->answer;
        $faq->qusation_en = $request->qusationen;
        $faq->answer_en = $request->answeren;
        $faq->update();


        //


        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();

    }

    ////delete  Faq
    public function destroy(Request $request, $id)
    {

        $service = Faq::findorfail($id);
        $service->delete();


    }
}
