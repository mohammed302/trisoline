<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Auth;
use Image;
use App\Client_order;
use App\Clinet_reply;
use App\Notification;
use Carbon;

class ClinetOrderController extends Controller {

    function __construct() {
        $this->middleware('auth:admin');
    }

    ////index
    public function index() {
        if (Auth::user()->type == 1) {
            $data['orders'] = Client_order::orderby('id', 'desc')->get();
            $data['color'] = Setting::find(1);
            return view('admin.clinet_order.orders', $data);
        }
    }

    ////delete  order
    public function destroy(Request $request, $id) {
        Clinet_reply::where('order_id', $id)->delete();
        $order = Client_order::findorfail($id);
        $order->delete();
    }

    //view  order

    function replies($id) {
        $data['order'] = Client_order::findorfail($id);
        $data['id'] = $id;
        $data['replies'] = Clinet_reply::where('order_id', $id)->orderby('id', 'desc')->get();
        $data['color'] = Setting::find(1);
        return view('admin.clinet_order.replies', $data);
    }

    ////delete  replay
    public function destroy_replay(Request $request, $id) {
        Clinet_reply::where('id', $id)->delete();
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
        $reply = new Clinet_reply();
        $reply->massege = $request->reply;
        $reply->user_id = 0;
        $reply->emp_id = Auth::user()->id;
        $reply->order_id = $request->id;
        if ($request->imgPath != null) {
            $reply->img = $input['imagename'];
        }
        $reply->time = $mytime = Carbon\Carbon::now();
        $reply->save();

        $order = Client_order::findorfail($request->id);
        
        $msg = new Notification();
        $msg->user_id = $order->user_id;
        $msg->content = 'رسالة جديدة من الادارة بطلب رقم# ' . $request->id;
        $msg->content_e = 'new massagefrom website mangement in order number# ' . $request->id;
        $msg->save();
        
        $msg = new Notification();
        $msg->user_id =$order->work->user_id;;
        $msg->content = 'رسالة جديدة من الادارة بطلب رقم# ' . $request->id;
        $msg->content_e = 'new massagefrom website mangement in order number# ' . $request->id;
        $msg->save();

        $request->session()->flash('alert-success', 'تم بنجاح');
        return redirect()->back();
    }

}
