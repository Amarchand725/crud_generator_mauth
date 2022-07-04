@extends('layouts.admin.app')
@section('title', 'Show Technology')
@push('css')
    <style>
        select {
            font-family: 'Font Awesome', 'sans-serif';
        }
    </style>
@endpush
@section('content')
    <section class="content-header">
        <div class="content-header-left">
            <h1>Show Technology</h1>
        </div>
        <div class="content-header-right">
            <a href="{{ route("technology.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
<label for="name" class="col-sm-2 control-label">Name</label>
<div class="col-sm-8">@if($model->status)<span class="label label-success">Active</span>@else<span class="label label-danger">In-Active</span>@endif<div>{{ $model->name }}</div></div></div><div class="form-group">
<label for="description" class="col-sm-2 control-label">Description</label>
<div class="col-sm-8">@if($model->status)<span class="label label-success">Active</span>@else<span class="label label-danger">In-Active</span>@endif<div>{{ $model->description }}</div></div></div><div class="form-group">
<label for="price" class="col-sm-2 control-label">Price</label>
<div class="col-sm-8">@if($model->status)<span class="label label-success">Active</span>@else<span class="label label-danger">In-Active</span>@endif<div>{{ $model->price }}</div></div></div><div class="form-group">
<label for="status" class="col-sm-2 control-label">Status</label>
<div class="col-sm-8">@if($model->status)<span class="label label-success">Active</span>@else<span class="label label-danger">In-Active</span>@endif<div>{{ $model->status }}</div></div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
@endpush
