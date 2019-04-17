<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Customer;

class CustomerloginController extends Controller
{
    public function __construct()
    {
            $this->middleware('auth:customer',['except' => ['index']]);
    }

    public function index()
    {
        return view('frontend.index');
    }
}

