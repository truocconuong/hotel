<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Room;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data['phongs']= Room::select('id','tenphong')->where('tinhtrang','=','0')->get();
        return view('admin.datphong.index',$data);
    }


    public function datalistroder(){
        $datphong = Order::with(['rooms','customer'])->get();
        $datatables = DataTables::of($datphong)
            ->addColumn('action', function ($datphong) {

                return view('admin.modal.btn-action-modal',
                    [
                        'edit' => '#edit_phong',
                        'delete_' => '#delete_phong',
                        'id' => $datphong->id,
                        'urlEdit' => route('admin.phong.update',['id' => $datphong->id]),
                        'detail' => route('admin.phong.show',['id' => $datphong->id]),
                        'delete' => route('admin.phong.delete', ['id' => $datphong->id])
                    ]);
            })
            ->addColumn('ngaydat',function (Order $datphong){
               $ngaydat='';
                foreach ($datphong->rooms as $room){
                   $ngaydat= $room->pivot->ngaydat;
               }
                return $ngaydat ? with(new Carbon($ngaydat))->format('d/m/Y') : '';

            })
            ->addColumn('ngaytra',function (Order $datphong){
                $ngaytra='';
                foreach ($datphong->rooms as $room){
                    $ngaytra= $room->pivot->ngaytra;
                }
                return $ngaytra ? with(new Carbon($ngaytra))->format('d/m/Y') : '';
            })
            ->addColumn('ngaytao',function (Order $datphong){
                $ngaytao=null;
                foreach ($datphong->rooms as $room){
                    $ngaytao= $room->pivot->created_at;
                }
                return $ngaytao ? with(new Carbon($ngaytao))->format('d/m/Y') : '';
            })
            ->addColumn('tenphong',function (Order $datphong){
                $tenphong='';
                foreach ($datphong->rooms as $room){
                    $tenphong= $room->tenphong;
                }
                return $tenphong;
            })
            ->rawColumns(['ngaydat','ngaytra','ngaytao','action']);

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
            'name' => 'required|unique:khachhang,tenkhachhang',
            'dienthoai' => 'required|numeric',
            'cmnd' => 'required|numeric',
            'gioitinh' => 'required',
            'diachi' => 'required',
            'phong_id' => 'required|exists:phong,id'

        ], [
            'name.required' => 'Vui lòng nhập Tên Dịch Vụ',
            'name.unique' => 'Tên này đã trùng',
            'gioitinh.required' => 'Vui Lòng Chọn Giới tính',
            'diachi.required' => 'Vui Lòng Nhập Địa Chỉ',
            'dienthoai.required' => 'Vui Lòng Nhập Điện Thoại',
            'cmnd.required' => 'Vui Lòng Nhập CMND',
            'phong_id.required' => 'Vui Lòng Chọn Phòng',
            'dienthoai.numeric' => 'Điện Thoại Phải Là Số',
            'cmnd.numeric' => 'CMND Phải Là Số',
        ]);

        if($valid->fails()){
            return Response::json(['errors' => $valid->errors()]);
        }else{

            $ngaydat = $request->input('checkin');
            $ngaytra =$request->input('checkout');


            $phong_id = $request->input('phong_id');
            $khachhang = New Customer();
            $khachhang->tenkhachhang = $request->input('name');
            $khachhang->diachi = $request->input('diachi');
            $khachhang->dienthoai = $request->input('dienthoai');
            $khachhang->cmnd = $request->input('cmnd');
            $khachhang->gioitinh = $request->input('gioitinh');
            $khachhang->user_id = auth()->id();
            $khachhang->save();

            $datphong = Order::create([
                'khachhang_id' => $khachhang->id
            ]);

//
            $datphong->rooms()->attach($phong_id,['ngaydat' => $ngaydat,'ngaytra' => $ngaytra]);


            return Response::json(['success' => '1']);
        }
    }


    public function delete($id){
        $phong = Order::findOrFail($id);
        if ($phong !== null) {
            $phong->delete();
            return Response::json(['success' => '1']);
        }
    }

}
