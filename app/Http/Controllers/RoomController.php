<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Room;
use App\Kind_of_room;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Carbon;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data['loaiphongs'] = Kind_of_room::orderBy('tenloaiphong', 'asc')->get();
        return view('admin.phong.index',$data);
    }


    public function datalistroom(){
        $phong = Room::with('loaiphong');
        $datatables = DataTables::of($phong)
            ->addColumn('action', function ($phong) {

                    return view('admin.modal.btn-action-modal',
                        [
                            'edit' => '#edit_phong',
                            'delete_' => '#delete_phong',
                            'id' => $phong->id,
                            'urlEdit' => route('admin.phong.update',['id' => $phong->id]),
                            'detail' => route('admin.phong.show',['id' => $phong->id]),
                            'delete' => route('admin.phong.delete', ['id' => $phong->id])
                        ]);
            })
            ->editColumn('tinhtrang',function (Room $phong){
                return $phong->tinhtrang == 1 ?'<span class="btn-success"><i class="glyphicon glyphicon-edit"></i>Đã Thuê</span>':'Trống';
            })
            ->editColumn('created_at', function (Room $phong) {
                return $phong->created_at ? with(new Carbon($phong->created_at))->format('d/m/Y') : '';
            })
            ->editColumn('updated_at', function (Room $phong) {
                return $phong->updated_at ? with(new Carbon($phong->updated_at))->format('d/m/Y') : '';
            })
            ->addColumn('image_show',function (Room $phong){
                return view('admin.modal.image',[
                    'image' => $phong->image

                ]);
            })
            ->rawColumns(['action','tinhtrang','image_show']);

        return $datatables->make(true);

    }

    public function show($id){
        $phong = Room::find($id);
        return response()->json([
            'id' => $phong->id,
            'tenphong' => $phong->tenphong,
            'mota' => $phong->mota,
            'image' => asset('uploads/'.$phong->image.''),
            'loaiphong_id' => $phong->loaiphong_id
        ]);

    }

    public function store(Request $request){


        $valid = Validator::make($request->all(), [
            'name' => 'required|unique:phong,tenphong',
            'image' => 'image|max:2048',
            'mota' => 'required',
            'loaiphong_id' => 'required|exists:loaiphong,id'

        ], [
            'name.required' => 'Vui lòng nhập Tên Phòng',
            'name.unique' => 'Tên này đã trùng vui lòng chọn Tên khác',
            'mota.required' => 'Vui Lòng Nhập Mô Tả',
            'image.max' => 'Kích cỡ ảnh quá lớn',
            'loaiphong_id.required' => 'Vui Lòng Chọn Loại Phòng',
            'loaiphong_id.exists' => 'Vui lòng nhập đúng Loaiphong_id',
        ]);

        if($valid->fails()){
            return Response::json(['errors' => $valid->errors()]);
        }else{

//            //Thêm hình ảnh
            $imageName= '';

            if($request->hasFile('image')){
                $image = $request->file('image');

                if (file_exists(public_path('uploads'))) {
                    $folder_name = date('Y-m-d');
                    $fileName = md5($image->getClientOriginalName() . time()).'.'. $image->getClientOriginalExtension();

                    if (!file_exists(public_path('uploads/' . $folder_name))) {
                        mkdir(public_path('uploads/' . $folder_name), 0755);
                    }

                    $imageName = "$folder_name/$fileName" ;
                    $image->move(public_path('uploads/' . $folder_name), $fileName);

                }
            }

            $phong = Room::create([
                'tenphong' => $request->input('name'),
                'mota' => $request->input('mota'),
                'image' => $imageName,
                'loaiphong_id' => $request->input('loaiphong_id'),
                'user_id' => auth()->id()

            ]);
            return Response::json(['success' => '1']);
        }
    }


    public function update(Request $request,$id){
        $valid = Validator::make($request->all(), [
            'edit_name' => 'required',
            'edit_image' => 'image|max:2048',
            'edit_mota' => 'required',
            'edit_loaiphong_id' => 'required|exists:loaiphong,id'

        ], [
            'edit_name.required' => 'Vui lòng nhập Tên Phòng',
            'edit_name.unique' => 'Tên này đã trùng vui lòng chọn Tên khác',
            'edit_mota.required' => 'Vui Lòng Nhập Mô Tả',
            'edit_image.max' => 'Kích cỡ ảnh quá lớn',
            'edit_loaiphong_id.required' => 'Vui Lòng Chọn Loại Phòng',
            'edit_loaiphong_id.exists' => 'Vui lòng nhập đúng Loaiphong_id',
        ]);

        if($valid->fails()){
            return Response::json(['errors' => $valid->errors()]);
        }else{
            $phong = Room::find($id);
            if($phong !== null) {
//            //Thêm hình ảnh
                $imageName = $phong->image;

                if ($request->hasFile('edit_image')) {
                    if (!is_dir(public_path('uploads/' . $phong->image)) && file_exists(public_path('uploads/' . $phong->image))) {
                        unlink(public_path('uploads/' . $phong->image));
                    }

                    $image = $request->file('edit_image');
                    if (file_exists(public_path('uploads'))) {
                        $folder_name = date('Y-m-d');
                        $fileName = md5($image->getClientOriginalName() . time()) . '.' . $image->getClientOriginalExtension();

                        if (!file_exists(public_path('uploads/' . $folder_name))) {
                            mkdir(public_path('uploads/' . $folder_name), 0755);
                        }
                        $imageName = "$folder_name/$fileName";
                        $image->move(public_path('uploads/' . $folder_name), $fileName);

                    }
                }

                $phong->tenphong = $request->input('edit_name');
                $phong->mota = $request->input('edit_mota');
                $phong->image = $imageName;
                $phong->loaiphong_id = $request->input('edit_loaiphong_id');
                $phong->user_id = auth()->id();
                $phong->save();

                return Response::json(['success' => '1']);
            }
        }
    }


    public function delete($id){
        $phong = Room::findOrFail($id);
        if ($phong !== null) {
            $phong->delete();
            return Response::json(['success' => '1']);
        }
    }

}