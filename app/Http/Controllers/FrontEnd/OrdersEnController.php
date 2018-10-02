<?php

namespace App\Http\Controllers\FrontEnd;

use App\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use App\User;
use Auth;
use Hash;
use App\Order;
use Carbon;
use Image;
use App\Clinet_product;
use App\Clinet_reply;
use App\Client_order;
use App\Notification;


class OrdersEnController extends Controller {

    function __construct() {
        $this->middleware('auth');
    }

    //index
    function index() {
        $data['setting'] = Setting::find(1);
        $data['allproduct'] = Clinet_product::where('user_id', Auth::user()->id)->count();
        $data['acceptproduct'] = Clinet_product::where('user_id', Auth::user()->id)->
                        where('status', 1)->count();
        $data['notification'] = Notification::where('user_id', Auth::user()->id)->where('status', 0)->count();
        return view('order_en.home', $data);
    }
//notification
      function notification() {
        $data['setting'] = Setting::find(1);
        $data['notification'] = Notification::where('user_id',Auth::user()->id)
                ->orderby('id', 'desc')->paginate(10);
       $no= Notification::where('user_id',Auth::user()->id)->where('status',0)->get();
       foreach ($no as $n){
       $n->status=1;
       $n->update();
       }
        return view('order_en.notification', $data);
    }
    //new orders
    function newOrderPage() {
        $data['setting'] = Setting::find(1);
        return view('order_en.new', $data);
    }

    //  order 
    public function order(Request $request) {


        $this->validate($request, [
            'title' => 'required',
            'message' => 'required',
        ]);
        $images = array();
        if ($files = $request->file('imgPath')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                //  $name=  time() . '.' . $file->getClientOriginalExtension();
                $file->move('img', $name);
                $images[] = $name;
            }
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->work_id = 0;
        $order->branch = $request->branch;
        $order->title = $request->title;
        $order->message = $request->message;
        $order->img = implode("|", $images);
        $order->time = Carbon\Carbon::now();
        $order->save();
        $request->session()->flash('alert-success', 'Done ');
        return redirect()->back();
    }

    ////orders
    public function orders() {


        $data['setting'] = Setting::find(1);
        $data['orders'] = Order::where('user_id', Auth::user()->id)->withCount('replies')->orderby('id', 'desc')->get();

        return view('order_en.orders', $data);
    }

    ////replies
    public function replies($id) {
        $data['setting'] = Setting::find(1);
        $data['order'] = Order::findorfail($id);
        $data['id'] = $id;
        $data['replies'] = Reply::where('order_id', $id)->orderby('id', 'desc')->get();

        return view('order_en.reply', $data);
    }

    function reply(Request $request) {
        if (Auth::check()) {
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
            $reply->user_id = Auth::user()->id;
            $reply->order_id = $request->id;
            if ($request->imgPath != null) {
                $reply->img = $input['imagename'];
            }
            $reply->time = $mytime = Carbon\Carbon::now();
            $reply->save();
            //
            $order = Order::findorfail($request->id);
            $msg = new Notification();
            if (Auth::user()->id != $order->work->user_id) {
                $msg->user_id = $order->work->user_id;
            } else {
                $msg->user_id = $order->user_id;
            }
            $msg->content = 'رسالة جديدة خاصة بطلب رقم# ' . $request->id;
            $msg->content_e = 'new massage in order number# ' . $request->id;
            $msg->save();
            $request->session()->flash('alert-success', 'Done ');
            return redirect()->back();
        }
    }

    ////index
    public function clinet_product() {

        $data['setting'] = Setting::find(1);
        $data['products'] = Clinet_product::where('user_id', Auth::user()->id)->orderby('id', 'desc')->get();


        return view('order_en.products', $data);
    }

    ////corders
    public function corders() {


        $data['setting'] = Setting::find(1);
        $data['orders'] = Clinet_product::where('user_id', Auth::user()->id)
                        //   ->withCount('clinet_replies')->
                        ->orderby('id', 'desc')->get();

        return view('order_en.corders', $data);
    }

    ////orders user
    public function corders_user() {


        $data['setting'] = Setting::find(1);
        $data['orders'] = Client_order::where('user_id', Auth::user()->id)
                        ->withCount('replies')
                        ->orderby('id', 'desc')->get();

        return view('order_en.corders_user', $data);
    }

    ////creplies
    public function creplies($id) {
        $data['setting'] = Setting::find(1);
        $data['order'] = Client_order::findorfail($id);
        $data['id'] = $id;
        $data['replies'] = Clinet_reply::where('order_id', $id)->orderby('id', 'desc')->get();

        return view('order_en.creply', $data);
    }

    // reply
    function creply(Request $request) {
        if (Auth::check()) {
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
            $reply->user_id = Auth::user()->id;
            $reply->order_id = $request->id;
            if ($request->imgPath != null) {
                $reply->img = $input['imagename'];
            }
            $reply->time = $mytime = Carbon\Carbon::now();
            $reply->save();
            //
            $order = Client_order::findorfail($request->id);
            $msg = new Notification();
            if (Auth::user()->id != $order->work->user_id) {
                $msg->user_id = $order->work->user_id;
            } else {
                $msg->user_id = $order->user_id;
            }
            $msg->content = 'رسالة جديدة خاصة بطلب رقم# ' . $request->id;
            $msg->content_e = 'new massage in order number# ' . $request->id;
            $msg->save();
            $request->session()->flash('alert-success', ' Done');
            return redirect()->back();
        }
    }

    ////add product
    public function create() {

        $data['setting'] = Setting::find(1);
        return view('order_en.new_product', $data);
    }

    public function store(Request $request) {


        $this->validate($request, [
            'imgPath' => 'required',
            'title' => 'required',
            'title_e' => 'required',
            'desc' => 'required',
            'endesc' => 'required',
        ]);

        $images = array();
        if ($files = $request->file('imgPath')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                //  $name=  time() . '.' . $file->getClientOriginalExtension();
                $file->move('img', $name);
                $images[] = $name;
            }
        }

        $clinet_product = new Clinet_product();
        $clinet_product->title = $request->title;
        $clinet_product->title_e = $request->title_e;
        $clinet_product->branch = $request->branch;
        $clinet_product->description = $request->desc;
        $clinet_product->description_en = $request->endesc;
        $clinet_product->status = 0;
        $clinet_product->user_id = Auth::user()->id;
        $clinet_product->img = implode("|", $images); //$input['imagename'];
        $clinet_product->save();




        $request->session()->flash('alert-success', 'Successfully added pending management approval');


        return redirect()->back();
    }

    ////update  product
    public function edit($id) {
        $data['product'] = Clinet_product::findorfail($id);
        $data['setting'] = Setting::find(1);
        return view('order_en.updateProduct', $data);
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
            // exit;
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


        $clinet_product = Clinet_product::findorfail($id);
        $clinet_product->title = $request->title;
        $clinet_product->title_e = $request->title_e;
         $clinet_product->branch = $request->branch;
        $clinet_product->description = $request->desc;
        $clinet_product->description_en = $request->endesc;
        if ($request->imgPath != null) {
            $old = $clinet_product->img;

            // exit;
            $clinet_product->img = $old . '|' . implode("|", $images);
        }

        $clinet_product->update();




        $request->session()->flash('alert-success', 'Successfully updated pending management approval');


        return redirect()->back();
    }
       public function deleteimg($image,Request $req){
         $clinet_product=Clinet_product::findorfail($req['post_id']);
         $images=explode('|', $clinet_product->img);
         if (($key = array_search($image, $images)) !== false) {
           unset($images[$key]);
           }
         $clinet_product->img=implode("|", $images);
         $clinet_product->status =0;
         $clinet_product->save();
        $req->session()->flash('alert-success', 'Successfully updated pending management approval');
         return redirect()->back();
}

    ////delete   Clinet_product
    public function destroy(Request $request, $id) {
       Client_order::where('work_id',$id)->delete();
        $clinet_product = Clinet_product::findorfail($id);
        $clinet_product->delete();
     
    }
    
    ////close   Clinet_order
    public function close(Request $request, $id) {

         $clinet_order = Client_order::findorfail($id);
         $clinet_order->status=2;
         $clinet_order->save();
    }

}
