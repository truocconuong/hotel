<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        return view('admin.user.index');
    }

    public function datalistuser(){

        $user = User::all();
        $datatables = DataTables::of($user)->addColumn('action', function ($user) {

            return view('admin.modal.btn-action-modal',
                [
                    'edit' => '#edit_user',
                    'id' => $user->id,
                    'email' => $user->email,
                    'name' => $user->name,
                    'urlEdit' => route('admin.users.update', ['id' => $user->id]),
                    'detail' => route('admin.users.show', ['id' => $user->id]),
                    'delete' => route('admin.users.delete',['id' => $user->id])
                ]);
             })->rawColumns([ 'rownum', 'action']);

        return $datatables->make(true);



    }



    public function store(Request $request){
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ], [
            'name.required' => 'Vui lòng nhập Họ Tên',
            'email.required' => 'Vui lòng nhập Email',
            'email.email' => 'Không đúng định dạng Email',
            'email.unique' => 'Email này đã trùng vui lòng chọn Email khác',
            'password.required' => 'Vui lòng nhập Mật Khẩu',
        ]);
        if ($valid->fails()) {
            return Response::json(['errors' => $valid->errors()]);
        } else {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);
            return Response::json(['success' => '1']);
        }
    }


    public function show($id)
    {
        $detail = User::find($id);
        return Response::json($detail);
    }
    public function update(Request $request,$id){
//        $valid = Validator::make($request->all(), [
//            'name' => 'required',
//            'email' => 'required|email|unique:users,email,' . $id,
//            'password' => 'confirmed'
//        ], [
//            'name.required' => 'Vui lòng nhập Họ Tên',
//            'email.required' => 'Vui lòng nhập Email',
//            'email.email' => 'Không đúng định dạng Email',
//            'email.unique' => 'Email này đã trùng vui lòng chọn Email khác'
//        ]);
//
//        if ($valid->fails()) {
//            return Response::json(['errors' => $valid->errors()]);
//        } else {
            $user = User::find($id);
            if ($user !== null) {
                $user->name = $request->input('edit_name');
                $user->email = $request->input('edit_email');
                if ($request->input('edit_password')) {
                    $user->password = bcrypt($request->input('edit_password'));
                }
                $user->save();
                    return redirect()->route('admin.users.index')->with('message', "Cập nhật người dùng $user->name thành công");
            }
            return redirect()->route('admin.users.index')->with('error', 'không tìm thấy người dùng');
//                return Response::json(['success' => '1']);

//        }

    }


    public function delete($id)
    {
        $user = User::findOrFail($id);
        if ($user !== null) {
            $user->delete();
            return redirect()->route('admin.users.index')->with('message', "Xóa người dùng $user->name thành công");
        }
        return redirect()->route('admin.users.index')->with('error', 'Không tìm thấy người dùng này');
    }
}
