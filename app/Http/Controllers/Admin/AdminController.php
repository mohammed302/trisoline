<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Setting;
use App\Admin;
use App\Work;
use App\Offer;
use App\Log;
use App\Order;
use App\Reply;
use App\Clinet_product;
use App\Email;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon;
use Image;

class AdminController extends Controller {

    function __construct() {
        $this->middleware('auth:admin');
    }

    function logout(Request $request) {

        auth('admin')->logout();

        return redirect('/admin-cpx');
    }

    function index() {
        if (Auth::user()->type == 1) {
            $data['users'] = User::where('id', '!=', 12)->count();
            $data['works'] = Work::count();
            $data['orders'] = Order::count();
            $data['offers'] = Offer::count();
            $data['prodicts'] = Clinet_product::where('status',0)->count();
            $data['replies'] = Reply::orderby('id', 'desc')->paginate(8);
            $data['borders'] = Order::orderby('id', 'desc')->paginate(8);
            ;
        } else {
            $data['works'] = Work::where('branch', Auth::user()->branch)->count();
            $data['offers'] = Offer::where('branch', Auth::user()->branch)->count();
            $data['orders'] = Order::where('branch', Auth::user()->branch)->count();
            $data['replies'] = Reply::orderby('id', 'desc')->paginate(8);
            if (Auth::user()->type == 2) {
                $data['replies'] = Reply::whereHas('order', function($q) {
                            $q->where('branch', Auth::user()->branch);
                        })->orderby('id', 'desc')->paginate(8);
                $data['borders'] = Order::where('branch', Auth::user()->branch)->orderby('id', 'desc')->paginate(8);
            } else {
                $data['replies'] = Reply::whereHas('order', function($q) {
                            $q->where('emp_id', Auth::user()->id);
                        })->orderby('id', 'desc')->paginate(8);
                $data['borders'] = Order::where('emp_id', Auth::user()->id)->orderby('id', 'desc')->paginate(8);
            }
        }
        $data['color'] = Setting::find(1);
        return view('admin.home', $data);
    }

    function setting() {
        $data['setting'] = Setting::find(1);
        $data['color'] = Setting::find(1);
        return view('admin.updateSetting', $data);
    }

    function updateSetting(Request $request) {
        $this->validate($request, ['name' => 'required', 'namee' => 'required', 'email' => 'required',
            'url' => 'required', 'google' => 'required',
            'facebook' => 'required', 'twitter' => 'required',
            'instagram' => 'required', 'youtube' => 'required',
            'color' => 'required|max:204',]);
        if ($request->imgPath != null) {
            $image = $request->file('imgPath');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = base_path() . '/img/';

            $img = Image::make($image->getRealPath(), array(
                        'width' => 217,
                        'height' => 35,
                            //  'grayscale' => false
            ));
            // $img->crop(new Point(0, 0), new Box(45, 45));
            $img->save($destinationPath . '/' . $input['imagename']);

            $destinationPath = base_path() . '/img/thumbnail';

            $image->move($destinationPath, $input['imagename']);
        }
      
  
        $setting = Setting::find(1);
        $setting->name = $request->name;
        $setting->namee = $request->namee;
        $setting->color = $request->color;
        $setting->email = $request->email;
        $setting->link = $request->url;
        if ($request->imgPath != null) {
            $setting->logo = $input['imagename'];
        }
       
        
        $setting->google = $request->google;


        // $setting->user_view = $request->user_view;
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->instagram = $request->instagram;
        $setting->youtube = $request->youtube;
        $setting->freelancer_link = $request->freelancer_link;
        $setting->project_link = $request->project_link;
        $setting->update();
        $request->session()->flash('alert-success', 'تم بنجاح');
        return redirect()->back();
    }

    function autoEmailContent() {
        $data['setting'] = Setting::find(1);
        $data['color'] = Setting::find(1);
        return view('admin.updateEmailContent', $data);
    }

    function autoEmailContentUpdate(Request $request) {
        $this->validate($request, ['desc' => 'required',]);
        $setting = Setting::find(1);
        $setting->email_massage_content = $request->desc;
        $setting->update();
        $request->session()->flash('alert-success', 'تم بنجاح');
        return redirect()->back();
    }

    function changePassword() {
        $data['color'] = Setting::find(1);
        return view('admin.changePassword', $data);
    }

    function changePass(Request $r) {
        $this->validate($r, [
            'pass' => 'required|max:204',
        ]);
        $u = Admin::find(Auth::user()->id);
        $u->password = bcrypt($r->pass);
        $u->pass = $r->pass;
        $u->update();
        $r->session()->flash('alert-success', 'تم  بنجاح');
        return redirect()->back();
    }

////////////////////////////////////////////
    function adminUsers() {
        $data['admins'] = Admin::where('type', '!=', '2')->get();
        $data['color'] = Setting::find(1);
        return view('admin.adminUsers.admins', $data);
    }

    function addAdmin() {
        $data['color'] = Setting::find(1);
        return view('admin.adminUsers.addAdmin', $data);
    }

    function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:204|unique:admins',
            'password' => 'required|min:6|',
            'email' => 'required|min:6|unique:admins',
        ]);
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->pass = $request->password;
        $admin->save();
        $request->session()->flash('alert-success', 'تمت الاضافة بنجاح');
        return redirect()->back();
    }

    function editAdmin( $admin) {
        $data['admin'] = Admin::findorfail($admin);
        $data['color'] = Setting::find(1);
        return view('admin.adminUsers.updateAdmin', $data);
    }

    function update(Request $request, Admin $admin) {
        $this->validate($request, [
            'name' => 'required|max:204|unique:admins,name,' . $admin->id,
            'password' => 'required|min:6|',
            'email' => 'required|min:6|unique:admins,email,' . $admin->id,
        ]);
        $admin = Admin::findorfail($admin);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->pass = $request->password;
        $admin->update();
        $request->session()->flash('alert-success', 'تم بنجاح');
        return redirect()->back();
    }

    function destroy(Request $request, Admin $admin) {

        if ($admin->delete()) {
            return "delete success";
        } else {
            return "delete failed";
        }
    }

    /// Orders
    function orders() {
        if (Auth::user()->type == 1) {
            $data['orders'] = Order::orderby('id', 'desc')->get();
            $data['color'] = Setting::find(1);
            return view('admin.order.orders', $data);
        }
    }
  function destroy_order(Request $request, Order $admin) {
  Reply::where('order_id',$admin->id)->delete();
        if ($admin->delete()) {
          
            return "delete success";
        } else {
            return "delete failed";
        }
    }
    function destroy_email(Request $request, Email $admin) {

        if ($admin->delete()) {
            return "delete success";
        } else {
            return "delete failed";
        }
    }
    function convert_to($id) {
        $data['id'] = $id;
        $data['color'] = Setting::find(1);
        if (Auth::user()->type != 1) {
            $data['emps'] = Admin::where('branch', Auth::user()->branch)->get();
        } else {
            $data['emps'] = Admin::all();
        }
        return view('admin.order.add_reply', $data);
    }

//
    function convert_to_post(Request $request) {

        $order = Order::findorfail($request->id);
        $order->emp_id = $request->emp;
        $order->update();
        $request->session()->flash('alert-success', 'تم بنجاح');
        return redirect()->back();
    }

    function reply(Request $request) {
        $this->validate($request, [
            'reply' => 'required',
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
        $reply = new Reply();
        $reply->massege = $request->reply;
        $reply->user_id = 0;
        $reply->emp_id = Auth::user()->id;
        $reply->order_id = $request->id;
        if ($request->imgPath != null) {
            $reply->img = $input['imagename'];
        }
        $reply->time = $mytime = Carbon\Carbon::now();
        $reply->save();
        $request->session()->flash('alert-success', 'تم بنجاح');
        return redirect()->back();
    }

    function replies($id) {
        $data['order'] = Order::findorfail($id);
        $data['id'] = $id;
        $data['replies'] = Reply::where('order_id', $id)->orderby('id', 'desc')->get();
        $data['color'] = Setting::find(1);
        return view('admin.order.replies', $data);
    }

    function brorders() {
        if (Auth::user()->type == 2) {
            $data['orders'] = Order::where('branch', Auth::user()->branch)->orderby('id', 'desc')->get();
        } elseif (Auth::user()->type == 3) {
            $data['orders'] = Order::where('branch', Auth::user()->branch)->
                            where('emp_id', Auth::user()->id)->orderby('id', 'desc')->get();
        } else {
            $data['orders'] = Order::orderby('id', 'desc')->get();
        }
        $data['color'] = Setting::find(1);
        return view('admin.order.orders', $data);
    }

    function changeStatus($id) {
        $data['id'] = $id;
        $data['order'] = Order::findorfail($id);
        $data['color'] = Setting::find(1);
        return view('admin.order.orderstatus', $data);
    }

    function changeStatusPost(Request $request) {

        $order = Order::findorfail($request->id);
        $order->status = $request->status;
        $order->update();
        $request->session()->flash('alert-success', 'تم بنجاح');
        return redirect()->back();
    }

//emails
    /// Orders
    function emails() {
        if (Auth::user()->type == 1) {
            $data['emails'] = Email::orderby('id', 'desc')->get();
            $data['color'] = Setting::find(1);
            return view('admin.emails', $data);
        }
    }

}
