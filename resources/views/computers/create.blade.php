@extends('layouts.admin.app')
@section('title', 'Add New Computer')
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
		<h1>Add New Computer</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route("computer.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route("computer.store") }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
<label for="image" class="col-sm-2 control-label">Image <span style="color:red">*</span></label>
<div class="col-sm-8"><input type="file" class="form-control" id="imgInput" name="image" accept="image/*">
<span style="color: red">{{ $errors->first("image") }}</span></div></div><div class="form-group">
<label for="image" class="col-sm-2 control-label">PREVIEW</label>
<div class="col-sm-8"><img src="{{ asset('public/default.png') }}" id="preview"  width="100px" alt=""></div></div><div class="form-group">
<label for="name" class="col-sm-2 control-label">Name <span style="color:red">*</span></label>
<div class="col-sm-8"><input type="text" class="form-control" name="name" value="{{ old("name") }}" placeholder="Enter name">
<span style="color: red">{{ $errors->first("name") }}</span></div></div><div class="form-group">
<label for="description" class="col-sm-2 control-label">Description <span style="color:red">*</span></label>
<div class="col-sm-8"><textarea class="form-control ckeditor" id="description" name="description" placeholder="Enter description">{{ old("description") }}</textarea>
<span style="color: red">{{ $errors->first("description") }}</span></div></div><div class="form-group">
<label for="status" class="col-sm-2 control-label">Status <span style="color:red">*</span></label>
<div class="col-sm-8"><select class="form-control" name="status"><option value="1" {{ old("status")==1?"selected":"" }}>Active</option><option value="0" {{ old("status")==0?"selected":"" }}>In Active</option></select><span style="color: red">{{ $errors->first("status") }}</span></div></div><label for="" class="col-sm-2 control-label"></label>
<div class="col-sm-6"><button type="submit" class="btn btn-success pull-left">Save</button></div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

@endsection
@push('js')
@endpush
