@extends('admin.layouts.master')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                {{ $err }}<br>
                            @endforeach
                        </div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="header">
                        <h4 class="title">Thông tin đơn hàng #{{ $order->id }}</h4>
                         <div class="content table-responsive table-full-width">
                                    <div>Mã khách hàng : {{ $order->id }}</div>
                                    <div>Tên khách hàng : {{ $order->name }}</div>
                                    <div>Địa chỉ : {{ $order->address }}</div>
                                    <div>Số điện thoại : {{ $order->phone }}</div>
                                    @if($order -> status == null )
                                    <div>Trạng thái đơn hàng : Đang chờ xử lý</div>
                                    @else
                                    <div>Trạng thái đơn hàng : Đã được xử lý</div>
                                    @endif
                    </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                {{ $err }}<br>
                            @endforeach
                        </div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="header">
                        <h4 class="title">Chi tiết đơn hàng</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>{{ trans('setting.users.id') }}</th>
                            <th>{{ trans('setting.order.total') }}</th>
                            <th>{{ trans('setting.order.quanity') }}</th>
                            <th>{{ trans('setting.order.order_id') }}</th>
                            <th>{{ trans('setting.order.name') }}</th>
                            </thead>
                            <tbody>
                            @foreach ($orderDetails as $us )
                                <tr>
                                    <td>{{ $us->id }}</td>
                                    <td>{{ $us->quanity }}</td>
                                    <td>{{ $us->price }}</td>
                                    <td>{{ $us->order_id }}</td>
                                    <td>{{ $us->cake->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

