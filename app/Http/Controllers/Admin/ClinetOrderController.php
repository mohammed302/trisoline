<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Auth;
use Image;
use App\Client_order;
use App\Clinet_reply;

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
         Clinet_reply::where('order_id',$id)->delete();
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
         Clinet_reply::where('id',$id)->delete();
    
      
    }
}
