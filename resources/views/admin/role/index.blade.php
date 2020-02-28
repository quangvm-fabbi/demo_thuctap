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
                            <h4 class="title">{{ trans('setting.role') }}</h4>
                            <a href="{{route('role.create')}}" class="btn btn-success">Add Role</a>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Roles</th>
                                    <th>Permissions</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{$role->name}}</td>
                                        <td>
                                            @if(count($role->permissions)>0)
                                                @foreach($role->permissions as $permission)
                                                    <span class="badge badge-success">{{$permission->name}}</span>
                                                @endforeach
                                            @else
                                                <span class="badge badge-danger">No permission</span>
                                            @endif
                                        </td>
                                        <td><a href="" class="badge badge-warning">Edit</a></td>
                                        <td><a href="" class="badge badge-danger">Delete</a></td>
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
