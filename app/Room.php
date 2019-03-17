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
}
