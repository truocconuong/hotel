<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
     protected $table = "hoadon";

     protected $fillable = ['id','khachhang_id','thuephong_id','tienphong','tiendichvu','tongtien','user_id'];
     protected $hidden =[];


}
