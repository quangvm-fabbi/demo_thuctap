@extends('admin.layouts.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">{{ trans('setting.add_role') }}</h4>
                        </div>
                        <div class="content">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $err)
                                        {{ $err }}<br>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{route('role.store')}}" method="post">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        @csrf
                                        <div class="card">
                                            <div class="card-header">Roles</div>
                                            <div class="card-body">
                                                <select name="role_id" class="form-control">
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="card-footer"><input type="submit" class="btn btn-success"
                                                                            name="add_role"
                                                                            value="Add Roles"/></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">Permissions</div>
                                            <div class="card-body">
                                                <ul>
                                                    @foreach ($permissions as $permission)
                                                        <li><input type="checkbox" name="permissions[]"
                                                                   value="{{$permission->id}}">{{$permission->name}}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
