<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class Customer extends Model
{
    protected $table='khachhang';
    protected $fillable  = ['tenkhachhang','cmnd','diachi','gioitinh','dienthoai','email','quoctich','username','password'];

    protected $hidden = [];


    public function order() {
        return $this->hasOne('App\Order', 'khachhang_id', 'id');
    }

}
