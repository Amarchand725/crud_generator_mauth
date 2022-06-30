@extends('layouts.admin.app')
@section('title', 'ADD NEW PRODUCT')
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
		<h1>ADD NEW PRODUCT</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route("product.index") }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route("product.store") }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
<label for="name" class="col-sm-2 control-label">Name <span style="color:red">*</span></label>
<div class="col-sm-8"><input type="text" class="form-control" name="name" value="{{ old("name") }}" placeholder="Enter name">
<span style="color: red">{{ $errors->first("name") }}</span></div></div><div class="form-group">
<label for="description" class="col-sm-2 control-label">Description</label>
<div class="col-sm-8"><textarea class="form-control" id="description" name="description" placeholder="Enter description">{{ old("description") }}</textarea>
<span style="color: red">{{ $errors->first("description") }}</span></div></div><div class="form-group">
<label for="price" class="col-sm-2 control-label">Price</label>
<div class="col-sm-8"><input type="number" class="form-control" name="price" value="{{ old("price") }}" placeholder="Enter price">
<span style="color: red">{{ $errors->first("price") }}</span></div></div><div class="form-group">
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
