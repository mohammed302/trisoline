<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Notification;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth:admin');
        $this->middleware('admin.type');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $data['users'] = User::where('id', '!=', 12)->get();
        $data['color'] = Setting::find(1);
        return view('admin.user.users', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $data['color'] = Setting::find(1);

        return view('admin.user.addUser', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {


        $this->validate($request, [
            'name' => 'required|max:204|unique:users',
            'password' => 'required|min:6|',
            'email' => 'required|min:6|unique:users',
            'tel' => 'required|unique:users',
            'address' => 'required',

           
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tel = $request->tel;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->save();



        $request->session()->flash('alert-success', 'تمت الاضافة بنجاح');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) {

        $data['color'] = Setting::find(1);
        $data['user'] = User::findorfail($user->id);



        return view('admin.user.updateUser', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user) {

        $this->validate($request, [
            'name' => 'required|max:204|unique:users,name,' . $user->id,
           
            'email' => 'required|min:6|unique:users,email,' . $user->id,
            'tel' => 'required|unique:users,tel,' . $user->id,
            'address' => 'required',
          
        ]);
        $user = User::findorfail($user->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tel = $request->tel;
          if ($request->password != null) {
        $user->password = bcrypt($request->password);
        }
        $user->address = $request->address;
        $user->update();
        $request->session()->flash('alert-success', 'تم بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) {

        if ($user->delete()) {
            return "delete success";
        } else {
            return "delete failed";
        }
    }
    
    
     public function block($user) {

        
        $user = User::findorfail($user);
        $user->status =0;
        $user->update();
        $msg = new Notification();
        $msg->user_id = $user->id;
        $msg->content = 'تم حظر حسابك لمخالفته الشروط والقوانين يمكنك التواصل مع الادارة ' ;
        $msg->content_e = 'Your account is block ';
        $msg->save();
      
    }
    
    
      public function unblock($user) {

        
        $user = User::findorfail($user);
        $user->status =1;
        $user->update();
        $msg = new Notification();
        $msg->user_id = $user->id;
        $msg->content = 'تم  فك حظر حسابك  ' ;
        $msg->content_e = 'Your account is unblock ';
        $msg->save();
      
    }

}
