<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='datphong';
    protected $fillable =['id','khachhang_id'];

    public function rooms() {
        return $this->belongsToMany('App\Room', 'chitietdatphong', 'datphong_id', 'phong_id')
            ->withPivot('ngaydat','ngaytra')
            ->withTimestamps();
    }
    public function customer() {
        return $this->belongsTo('App\Customer', 'khachhang_id', 'id');
    }

}
