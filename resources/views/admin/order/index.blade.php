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
                        <h4 class="title">List Orders</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>{{ trans('setting.users.id') }}</th>
                                <th>{{ trans('setting.order.total_quan') }}</th>
                                <th>{{ trans('setting.order.total_price') }}</th>
                                <th>{{ trans('setting.order.note') }}</th>
                                <th>{{ trans('setting.order.status') }}</th>
                                <th>{{ trans('setting.order.name') }}</th>
                                <th>{{ trans('setting.order.email') }}</th>
                                <th>{{ trans('setting.order.phone') }}</th>
                                <th>{{ trans('setting.order.address') }}</th>
                                <th>{{ trans('setting.order.user') }}</th>
                            </thead>
                            <tbody>
                                @foreach ($order as $us )
                                <tr>
                                    <td>{{ $us->id }}</td>
                                    <td>{{ $us->total_quanity }}</td>
                                    <td>{{ $us->total_price }}</td>
                                    <td>{{ $us->note }}</td>
                                    <td> @if( $us->status == null )
                                        Pending
                                        @else( $us->status != null )
                                        OK
                                        @endif</td>
                                    <td>{{ $us->name }}</td>
                                    <td>{{ $us->email }}</td>
                                    <td>{{ $us->phone }}</td>
                                    <td>{{ $us->address }}</td>
                                    <td>{{ $us->user_id }}</td>
                                    <td class="option">
                                        <a href="{{ route('order.show', $us->id) }}">
                                            <button class="font-icon-detail" type="button">
                                                <i class="pe-7s-look"></i>
                                            </button>
                                        </a>
                                        <button class="font-icon-detail" data-id="{{ $us->id }}" type="button"
                                            onclick="deleteUser(this);">
                                            <i class="pe-7s-trash"></i>
                                        </button>
                                        <form class="form-{{ $us->id }}" action="{{ route('order.destroy', $us->id) }}"
                                            method="POST" style="display: none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $order->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
