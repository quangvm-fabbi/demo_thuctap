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
                        <h4 class="title">{{ trans('setting.users.title_user') }}</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>{{ trans('setting.users.id') }}</th>
                            <th>{{ trans('setting.users.name') }}</th>
                            <th>{{ trans('setting.users.role') }}</th>
                            <th>{{ trans('setting.users.phone') }}</th>
                            <th>{{ trans('setting.users.address') }}</th>
                            <th>{{ trans('setting.users.email') }}</th>
                            </thead>
                            <tbody>
                            @foreach ($user as $us )
                                <tr>
                                    <td>{{ $us->id }}</td>
                                    <td id="user-{{ $us['id'] }}-name">{{ $us->name }}</td>
                                    <td>{{ $us->role->name }}</td>
                                    <td>{{ $us->phone_number }}</td>
                                    <td>{{ $us->address }}</td>
                                    <td>{{ $us->email }}</td>
                                    <td class="option">
                                        <a href="{{ route('user.edit', $us->id) }}">
                                            <button class="font-icon-detail" type="button">
                                                <i class="pe-7s-pen"></i>
                                            </button>
                                        </a>
                                        <button class="font-icon-detail" data-id="{{ $us->id }}" type="button"
                                                onclick="deleteUser(this);">
                                            <i class="pe-7s-trash"></i>
                                        </button>
                                        <form class="form-{{ $us->id }}" action="{{ route('user.destroy', $us->id) }}"
                                              method="POST" style="display: none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
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

