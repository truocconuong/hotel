<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Order;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;
    protected $table='khachhang';
    protected $fillable  = ['tenkhachhang','cmnd','diachi','gioitinh','dienthoai','email','quoctich','username','password'];

    protected $hidden = [];


    public function order() {
        return $this->hasOne('App\Order', 'khachhang_id', 'id');
    }

}
