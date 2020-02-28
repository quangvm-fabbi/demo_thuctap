@extends('admin.layouts.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">{{ trans('setting.cake.add_product') }}</h4>
                        </div>
                        <div class="content">
                            <form action="{{ route('cake.update', $cake->id) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>{{ trans('setting.cake.name') }}</label>
                                            <input type="text" class="form-control" name="name"
                                                   value="{{ $cake->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>{{ trans('setting.cake.status') }}</label>
                                            <input type="text" class="form-control" name="status"
                                                   value="{{ $cake->status }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{ trans('setting.cake.quanity') }}</label>
                                            <input type="text" class="form-control" name="quanity"
                                                   value="{{ $cake->quanity }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('setting.cake.price') }}</label>
                                            <input type="text" class="form-control" name="price"
                                                   value="{{ $cake->price }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ trans('setting.cake.price_sale') }}</label>
                                            <input type="text" class="form-control" name="price_sale"
                                                   value="{{ $cake->price_sale }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>{{ trans('setting.cake.category') }}</label>
                                        <select class="select2 form-control custom-select" name="category_id"
                                                id="category_id">
                                            <option>{{ trans('setting.cake.title1') }}</option>
                                            @foreach ($category as $cate)
                                                <option
                                                    @if($cake->category_id == $cate->id)
                                                    selected
                                                    @endif
                                                    value="{{ $cate->id }}">{{ $cate->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div/>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ trans('setting.cake.description') }}</label>
                                                <textarea name="description" rows="5"
                                                          class="form-control">{{ $cake->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit"
                                            class="btn btn-info btn-fill pull-right">{{ trans('setting.submit') }}</button>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
