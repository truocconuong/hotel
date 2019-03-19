<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table='khachhang';
    protected $fillable  = ['tenkhachhang','cmnd','diachi','gioitinh','dienthoai','email','quoctich','username','password'];

    protected $hidden = [];
}
