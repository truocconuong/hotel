@extends('adminlte::master')
@section('body')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <section class="content">
            @if (Auth::guard('web')->check())
                <p class="text-success">
                    You are Logged In as a <strong>USER</strong>
                </p>
            @else
                <p class="text-danger">
                    You are Logged Out as a <strong>USER</strong>
                </p>
            @endif

            @if (Auth::guard('customer')->check())
                <p class="text-success">
                    You are Logged In as a <strong>ADMIN</strong>
                </p>
            @else
                <p class="text-danger">
                    You are Logged Out as a <strong>ADMIN</strong>
                </p>
            @endif
            Đây Là Dashboard

        </section>

    </div>


@endsection
