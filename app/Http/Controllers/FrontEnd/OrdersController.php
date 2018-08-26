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
use App\Client_order;
use App\Clinet_reply;
use Carbon;
use Image;
use App\Clinet_product;

class OrdersController extends Controller {

    function __construct() {
        $this->middleware('auth');
    }

    //index
    function index() {
        $data['setting'] = Setting::find(1);
        $data['allproduct'] = Clinet_product::where('user_id',Auth::user()->id)->count();
        $data['acceptproduct'] = Clinet_product::where('user_id',Auth::user()->id)->
                where('status',1)->count();
        return view('order.home', $data);
    }

    //new orders
    function newOrderPage() {
        $data['setting'] = Setting::find(1);
        return view('order.new', $data);
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
        $request->session()->flash('alert-success', 'تم بنجاح');
        return redirect()->back();
    }

    ////orders
    public function orders() {


        $data['setting'] = Setting::find(1);
        $data['orders'] = Order::where('user_id', Auth::user()->id)->withCount('replies')->orderby('id', 'desc')->paginate(10);

        return view('order.orders', $data);
    }

    ////replies
    public function replies($id) {
        $data['setting'] = Setting::find(1);
        $data['order'] = Order::findorfail($id);
        $data['id'] = $id;
        $data['replies'] = Reply::where('order_id', $id)->orderby('id', 'desc')->get();

        return view('order.reply', $data);
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
            $request->session()->flash('alert-success', 'تم بنجاح');
            return redirect()->back();
        }
    }
    ////index
    public function  clinet_product() {
       
       $data['setting'] = Setting::find(1);
      $data['products'] =  Clinet_product::where('user_id',Auth::user()->id)->orderby('id', 'desc')->get();
      

        return view('order.products', $data);
    }
  ////corders
    public function corders() {


        $data['setting'] = Setting::find(1);
        $data['orders'] = Clinet_product::where('user_id', Auth::user()->id)
             //   ->withCount('clinet_replies')->
                ->orderby('id', 'desc')->paginate(10);

        return view('order.corders', $data);
    }
     ////orders user
    public function corders_user() {


        $data['setting'] = Setting::find(1);
        $data['orders'] = Client_order::where('user_id', Auth::user()->id)
                ->withCount('replies')
                ->orderby('id', 'desc')->paginate(10);

        return view('order.corders_user', $data);
    }
    
      ////creplies
    public function creplies($id) {
        $data['setting'] = Setting::find(1);
        $data['order'] = Client_order::findorfail($id);
        $data['id'] = $id;
        $data['replies'] = Clinet_reply::where('order_id', $id)->orderby('id', 'desc')->get();

        return view('order.creply', $data);
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
            $request->session()->flash('alert-success', 'تم بنجاح');
            return redirect()->back();
        }
    }
    ////add product
    public function create() {

        $data['setting'] = Setting::find(1);
        return view('order.new_product', $data);
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

         $clinet_product = new  Clinet_product();
         $clinet_product->title = $request->title;
         $clinet_product->title_e = $request->title_e;
         $clinet_product->description = $request->desc;
         $clinet_product->description_en = $request->endesc;
         $clinet_product->status =0;
         $clinet_product->user_id =Auth::user()->id;
         $clinet_product->img = implode("|", $images); //$input['imagename'];
         $clinet_product->save();




        $request->session()->flash('alert-success', 'تم الإضافة بنجاح بانتظار موافقة الإدارة');


        return redirect()->back();
    }

    ////update  work
    public function edit($id) {
        $data['work'] =  Clinet_product::findorfail($id);
        $data['color'] = Setting::find(1);
        return view('admin.work.update Clinet_product', $data);
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


         $clinet_product =  Clinet_product::findorfail($id);
         $clinet_product->title = $request->title;
         $clinet_product->title_e = $request->title_e;
         $clinet_product->description = $request->desc;
         $clinet_product->description_e = $request->endesc;
         $clinet_product->branch = $request->branch;
        if ($request->imgPath != null) {
            $old=     $clinet_product->img ;
       
           // exit;
             $clinet_product->img =    $old.'|'. implode("|", $images);
           
        }
        
         $clinet_product->update();




        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////delete   Clinet_product
    public function destroy(Request $request, $id) {

         $clinet_product =  Clinet_product::findorfail($id);
         $clinet_product->delete();
    }

}
