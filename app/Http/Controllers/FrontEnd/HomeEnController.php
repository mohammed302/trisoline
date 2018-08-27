<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use App\User;
use App\Log;
use App\Home_setting;
use Auth;
use Hash;
use App\Page;
use App\Faq;
use App\Service;
use App\Work;
use App\News;
use App\Offer;
use Illuminate\Support\Facades\Mail;
use Carbon;
use App\Reply;
use App\Order;
use App\Slider;
use App\Product;
use App\Clinet_product;
use App\Client_order;
use App\Notification;

class HomeEnController extends Controller {

    ////ihome page
    public function index() {

        $data['home_setting'] = Home_setting::find(1);
        $data['works'] = Work::orderby('id', 'desc')->paginate(5);
        $data['sliders'] = Slider::where('branch', 0)->orderby('id', 'desc')->get();
        $data['setting'] = Setting::find(1);
        $data['fnews'] = News::orderby('id', 'desc')->paginate(2);
        return view('front_en.home', $data);
    }

    ////branch page
    public function branch($id) {
        if ($id == 1) {
            $data['title'] = 'Saudi Arabia';
        } elseif ($id == 2) {
            $data['title'] = 'China';
        } else {
            $data['title'] = 'Turkey';
        }
        $data['home_setting'] = Home_setting::find(1);
        $data['b_setting'] = Home_setting::findorfail($id + 1);
        $data['works'] = Work::where('branch', $id)->orderby('id', 'desc')->paginate(5);
        $data['products'] = Product::where('branch', $id)->orderby('id', 'desc')->paginate(5);
        $data['offers'] = Offer::where('branch', $id)->orderby('id', 'desc')->paginate(5);
        $data['services'] = Service::where('branch', $id)->orderby('id', 'desc')->get();
        $data['sliders'] = Slider::where('branch', $id)->orderby('id', 'desc')->get();
        $data['setting'] = Setting::find(1);
        $data['id'] = $id;
        $data['fnews'] = News::orderby('id', 'desc')->paginate(2);
        return view('front_en.branch', $data);
    }

    //// about page
    public function about_us() {

        $data['home_setting'] = Home_setting::find(1);
        $data['setting'] = Setting::find(1);
        $data['about_us'] = Page::find(1);
        $data['fnews'] = News::orderby('id', 'desc')->paginate(2);
        return view('front_en.about_us', $data);
    }

    ////services page
    public function services() {

        $data['home_setting'] = Home_setting::find(1);
        $data['setting'] = Setting::find(1);
        $data['services'] = Service::all();
        $data['fnews'] = News::orderby('id', 'desc')->paginate(2);
        return view('front_en.services', $data);
    }

    //// works page
    public function works() {

        $data['home_setting'] = Home_setting::find(1);
        $data['setting'] = Setting::find(1);
        $data['t'] = 1;
        $data['id'] = 4;
        $data['all'] = 1;
        $data['works'] = Work::where('branch', 3)->select('id', 'title_e', 'branch', 'img')->orderby('id', 'desc')->get();
        $data['products'] = Product::orderby('id', 'desc')->get();
        $data['fnews'] = News::orderby('id', 'desc')->paginate(2);
        return view('front_en.works', $data);
    }

    //// works branch page
    public function works_branch($id) {

        $data['home_setting'] = Home_setting::find(1);
        $data['setting'] = Setting::find(1);
        $data['t'] = 1;
        $data['id'] = $id;
        $data['works'] = Work::where('branch', $id)->orderby('id', 'desc')->paginate(10);
        $data['fnews'] = News::orderby('id', 'desc')->paginate(2);
        return view('front_en.works', $data);
    }

//// work Details page
    public function work_Details($id) {

        $data['home_setting'] = Home_setting::find(1);
        $data['setting'] = Setting::find(1);
        $data['t'] = 1;
        $data['work'] = Work::findorfail($id);
        $data['fnews'] = News::orderby('id', 'desc')->paginate(2);
        return view('front_en.single_work', $data);
    }

    //// products page
    public function products() {

        $data['home_setting'] = Home_setting::find(1);
        $data['setting'] = Setting::find(1);
        $data['t'] = 2;
        $data['works'] = Product::orderby('id', 'desc')->paginate(10);
        $data['fnews'] = News::orderby('id', 'desc')->paginate(2);
        return view('front_en.works', $data);
    }

    //// works branch page
    public function products_branch($id) {

        $data['home_setting'] = Home_setting::find(1);
        $data['setting'] = Setting::find(1);
        $data['t'] = 2;
        $data['id'] = $id;
        $data['works'] = Product::where('branch', $id)->orderby('id', 'desc')->paginate(10);
        $data['fnews'] = News::orderby('id', 'desc')->paginate(2);
        return view('front_en.works', $data);
    }

//// work Details page
    public function product_Details($id) {

        $data['home_setting'] = Home_setting::find(1);
        $data['setting'] = Setting::find(1);
        $data['t'] = 2;
        $data['work'] = Product::findorfail($id);
        $data['fnews'] = News::orderby('id', 'desc')->paginate(2);
        return view('front_en.single_work', $data);
    }

    //// cproduct page
    public function cproducts() {

        $data['home_setting'] = Home_setting::find(1);
        $data['setting'] = Setting::find(1);
        $data['products'] = Clinet_product::where('status', 1)->orderby('id', 'desc')->paginate(10);
        $data['fnews'] = News::orderby('id', 'desc')->paginate(2);
        return view('front_en.cproducts', $data);
    }

    /// cproduct_Details Details page
    public function cproduct_Details($id) {

        $data['home_setting'] = Home_setting::find(1);
        $data['setting'] = Setting::find(1);
        $data['t'] = 2;
        $data['work'] = Clinet_product::findorfail($id);
        $data['fnews'] = News::orderby('id', 'desc')->paginate(2);
        return view('front_en.single_cproduct', $data);
    }

    // cproduct order
    public function cproduct_order(Request $request) {
        if (Auth::check()) {

            $this->validate($request, [
                'message' => 'required',
            ]);

            $order = new Client_order();
            $order->user_id = Auth::user()->id;
            $order->work_id = $request->work_id;
            $order->time = Carbon\Carbon::now();
            $order->message = $request->message;

            $order->save();
            $pr = Clinet_product::findorfail($request->work_id);
            $msg = new Notification();

            $msg->user_id = $pr->user_id;

            $msg->content = 'هناك طلب جديد للمنتج # ' . $pr->title;
            $msg->content_e = 'new order for product ' . $pr->title_e;
            $msg->save();
            //
            //



            $request->session()->flash('alert-success', 'Done ');




            return redirect()->back();
        } else {

            return redirect(route('front_en.index'));
        }
    }

    // work order
    public function order(Request $request) {
        if (Auth::check()) {

            $this->validate($request, [
                'message' => 'required',
            ]);

            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->work_id = $request->work_id;
            $order->branch = $request->branch;
            $order->message = $request->message;

            $order->save();

            //



            $request->session()->flash('alert-success', 'Done ');




            return redirect()->back();
        } else {

            return redirect(route('fronten.index'));
        }
    }

    function replies($id) {

        if (Auth::check()) {
            $data['home_setting'] = Home_setting::find(1);
            $data['order'] = Order::where('id', $id)->first();
            $data['id'] = $id;
            $data['replies'] = Reply::where('order_id', $id)->get();
            $data['setting'] = Setting::find(1);
            $data['fnews'] = News::orderby('id', 'desc')->paginate(2);
            return view('front_en.replies', $data);
        } else {

            return redirect(route('fronten.index'));
        }
    }

    function reply(Request $request) {
        if (Auth::check()) {
            $this->validate($request, [
                'reply' => 'required',
            ]);
            $reply = new Reply();
            $reply->massege = $request->reply;
            $reply->user_id = Auth::user()->id;
            $reply->order_id = $request->id;
            $reply->time = $mytime = Carbon\Carbon::now();
            $reply->save();
            $request->session()->flash('alert-success', 'Done ');
            return redirect()->back();
        }
    }

    //// news page
    public function news() {

        $data['home_setting'] = Home_setting::find(1);
        $data['setting'] = Setting::find(1);
        $data['news'] = News::orderby('id', 'desc')->paginate(5);
        $data['fnews'] = News::orderby('id', 'desc')->paginate(2);
        return view('front_en.news', $data);
    }

    //// newsDetails page
    public function newsDetails($id) {

        $data['home_setting'] = Home_setting::find(1);
        $data['setting'] = Setting::find(1);
        $data['new'] = News::findorfail($id);
        $data['fnews'] = News::orderby('id', 'desc')->paginate(2);
        return view('front_en.news_details', $data);
    }

    ////faqs page
    public function faqs() {

        $data['home_setting'] = Home_setting::find(1);
        $data['setting'] = Setting::find(1);
        $data['faqs'] = Faq::all();
        $data['fnews'] = News::orderby('id', 'desc')->paginate(2);
        return view('front_en.faq', $data);
    }

    //// condition page
    public function conditions() {

        $data['home_setting'] = Home_setting::find(1);
        $data['setting'] = Setting::find(1);
        $data['term'] = Page::find(2);
        $data['fnews'] = News::orderby('id', 'desc')->paginate(2);
        return view('front_en.term', $data);
    }

    ////contact page
    public function contact() {
        $data['map'] = Home_setting::find(2);
        $data['map2'] = Home_setting::find(3);
        $data['map3'] = Home_setting::find(4);
        $data['home_setting'] = Home_setting::find(1);

        $data['setting'] = Setting::find(1);
        $data['fnews'] = News::orderby('id', 'desc')->paginate(2);
        return view('front_en.contactus', $data);
    }

    public function contact_post(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:204',
            'email' => 'required',
            'comment' => 'required',
        ]);
        $content = $request->comment;
        $email_to = Setting::find(1);
        Mail::send('email.contact', ['title' => 'استفسار', 'content' => $content, 'from' => $request->email,
            'name' => $request->name], function ($message) use ($request, $email_to) {

            $message->subject('استفسار');

            $message->to($email_to->email);
        });
        $request->session()->flash('alert-success', ' Done  ');
        return redirect()->back();
    }

    ////orders
    public function orders() {

        if (Auth::check()) {
            $data['home_setting'] = Home_setting::find(1);
            $data['orders'] = Order::where('user_id', Auth::user()->id)->paginate(10);
            $data['setting'] = Setting::find(1);
            $data['fnews'] = News::orderby('id', 'desc')->paginate(2);
            return view('front_en.orders', $data);
        } else {

            return redirect(route('fronten.home'));
        }
    }

///Profile
    public function Profile() {
        if (Auth::check()) {
            $data['home_setting'] = Home_setting::find(1);
            $data['setting'] = Setting::find(1);
            $data['fnews'] = News::orderby('id', 'desc')->paginate(2);
            return view('front_en.profile', $data);
        } else {

            return redirect(route('front_en.home'));
        }
    }

    public function updateProfile(Request $request) {
        if (Auth::check()) {

            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'tel' => 'required',
            ]);

            $user = User::find(Auth::user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->tel = $request->tel;
            $user->address = $request->address;
            if ($request->current_password != null) {
                if (!Hash::check($request->current_password, $user->password)) {
                    $request->session()->flash('alert-danger', 'password is no correct');
                    return back()
                                    ->with('error', 'كلمة المرور الحالية غير صحيحة');
                } else {
                    $user->password = bcrypt($request->password);
                }
            }
            $user->update();

            //



            $request->session()->flash('alert-success', 'Done ');




            return redirect()->back();
        } else {

            return redirect(route('front.index'));
        }
    }

    ////frogetPassword page
    public function frogetPassword() {
        if (!Auth::check()) {
            $data['home_setting'] = Home_setting::find(1);
            $data['setting'] = Setting::find(1);
            $data['about_us'] = Page::find(1);
            $data['fnews'] = News::orderby('id', 'desc')->paginate(2);
            return view('front_en.email', $data);
        } else {
            return redirect(route('front.index'));
        }
    }

    public function logout() {

        auth('web')->logout();

        return redirect('/en');
    }

}
