<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Kind_of_room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $except= array('logout','Roomdetail','Listroom','about','checkRoom','datphong');
        $this->middleware('guest:customer',['except' => $except]);
    }

    /**
     * Trang chủ
     *
     * @return \Illuminate\Http\Response
     */


    public function Roomdetail(){
        return view('frontend.room_detail');
    }
    public function Listroom(){
        return view('frontend.list-room');
    }

    public function about(){

       return view('frontend.about');
    }
    public function logout(){
        Auth::guard('customer')->logout();
        return redirect('/');

    }
    public function getLogin(){
        if (Auth::guard('customer')->check()) {
            return redirect('/');
        }else{
            return view('frontend.login');
        }

    }
    public function checkRoom(Request $request){
        $data['ngayden']= $request->input('ngayden');
        $data['ngaytra']= $request->input('ngaytra');
        $data['phong'] = Kind_of_room::with(['rooms' => function($query){
            $query->where('tinhtrang','0');
        }])->get()->toArray();
//        $phong = DB::table('loaiphong')
//            ->join('phong', 'phong.loaiphong_id', '=', 'loaiphong.id')
//            ->where('tinhtrang',0)
//            ->get();
        return view('frontend.datphong',$data);
    }
    public function postLogin(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'

        ], [
            'username.required' => 'Vui Lòng Nhập Username',
            'password.required' => 'Vui Lòng Nhập Password',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            if (Auth::guard('customer')->attempt(['username' => $request->username, 'password' => $request->password])) {

               return redirect()->back();

            } else {
                return redirect('/login');

            }

        }
    }
    public function datphong(){
        return view('frontend.datphong');
    }

    public function getListroom(){


    }
}
