<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Kind_of_room;

class CustomerloginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer', ['except' => ['index']]);
    }

    public function index()
    {
        $data['listroom'] = Kind_of_room::with('rooms')->orderBy('id', 'desc')->get();

        return view('frontend.index', $data);
    }
    public function info()
    {
        return view('frontend.info');
    }

}
