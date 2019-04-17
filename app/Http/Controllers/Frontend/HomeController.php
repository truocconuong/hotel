<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Customer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer',['except' => ['logout']]);
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

//
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

               return redirect('/');

            } else {
                return redirect('/login');

            }

        }
    }
}
