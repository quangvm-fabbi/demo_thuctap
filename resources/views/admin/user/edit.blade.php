@extends('admin.layouts.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">{{ trans('setting.users.edit') }}</h4>
                        </div>
                        <div class="content">
                            <form action="{{ route('user.update', $user->id) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>{{ trans('setting.users.name') }}</label>
                                            <input type="text" class="form-control" name="name"
                                                   value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>{{ trans('setting.users.address') }}</label>
                                            <input type="text" class="form-control" name="address"
                                                   value="{{ $user->address }}">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">{{ trans('setting.users.email') }}</label>
                                            <input type="email" class="form-control" name="email"
                                                   value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{ trans('setting.users.phone') }}</label>
                                            <input type="number" class="form-control" name="phone_number"
                                                   value="{{ $user->phone_number }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label>{{ trans('setting.role') }}</label>
                                        <select class="select2 form-control custom-select" name="role_id"
                                                id="role_id">
                                            @foreach ($roles as $role)
                                                <option
                                                    @if($user->role_id == $role->id)
                                                    selected
                                                    @endif
                                                    value="{{ $role->id }}">{{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit"
                                                class="btn btn-info btn-fill pull-right">{{ trans('setting.submit') }}</button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
