<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kind_of_room;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class KroomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('admin.loaiphong.index');
    }

    public function datalistphong()
    {

        $loaiphong = Kind_of_room::all();
        $datatables = DataTables::of($loaiphong)->addColumn('action', function ($loaiphong) {

            return view('admin.modal.btn-action-modal',
                [
                    'edit' => '#edit_loaiphong',
                    'id' => $loaiphong->id,
                    'urlEdit' => route('admin.loaiphong.update',['id' => $loaiphong->id]),
                    'detail' => route('admin.loaiphong.show', ['id' => $loaiphong->id]),
                    'delete' => route('admin.loaiphong.delete', ['id' => $loaiphong->id])
                ]);
        })->rawColumns(['rownum', 'action']);;

        return $datatables->make(true);


    }

    public function show($id)
    {
        $loaiphong = Kind_of_room::find($id);
        $output = array(
            'tenloaiphong' => $loaiphong->tenloaiphong,
            'slug' => $loaiphong->slug
        );
        echo json_encode($output);

    }

    public function update(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'edit_name' => 'required',
        ], [
            'edit_name.required' => 'Vui lòng nhập Tên',
        ]);
        $error_array=array();
        if ($valid->fails()) {
            return Response::json(['errors' => $valid->errors()]);
        } else {
            $id = $request->get('edit_id');
            $loaiphong = Kind_of_room::find($id);
            if ($loaiphong !== null) {
                $loaiphong->tenloaiphong = $request->input('edit_name');
                $loaiphong->slug = str_slug($request->input('edit_name'));
                $loaiphong->save();
                return Response::json(['success' => '1']);
            }
        }

    }

    public function store(Request $request){
        $valid = Validator::make($request->all(), [
            'name' => 'required|unique:loaiphong,tenloaiphong',

        ], [
            'name.required' => 'Vui lòng nhập Họ Tên',
            'name.unique' => 'name này đã trùng vui lòng chọn name khác',
        ]);
        if ($valid->fails()) {
            return Response::json(['errors' => $valid->errors()]);
        } else {
            $loaiphong = Kind_of_room::create([
                'tenloaiphong' => $request->input('name'),
                'slug' => str_slug($request->input('name'))
            ]);
            return Response::json(['success' => '1']);
        }
    }
    public function delete(){

    }
}