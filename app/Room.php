<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Room extends Model
{
    protected $table='phong';


    protected $fillable = [
        'tenphong', 'tinhtrang','mota','image','loaiphong_id','user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function loaiphong()
    {
        return $this->belongsTo('App\Kind_of_room', 'loaiphong_id', 'id');
    }


    public function chitietdatphong()
    {
        return $this->belongsTo('App\Orderdetail','phong_id','id');
            //->withPivot('ngaydat','ngaytra')
            //->withTimestamps();
    }


    public function order()
    {
        return $this->belongsToMany('App\Order', 'chitietdatphong', 'phong_id', 'datphong_id')
            ->withPivot('ngaydat','ngaytra')
            ->withTimestamps();
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'khachhang_id', 'id');
    }


    public function phong(){

        return $this->belongsToMany('App\Room','phong_id');
    }
}
