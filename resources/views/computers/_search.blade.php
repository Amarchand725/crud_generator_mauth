@foreach($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{  $models->firstItem()+$key }}.</td>
        <td>@if($model->image)<img style="border-radius: 50%;" src="{{ asset("public/admin/images/computers") }}/{{ $model->image }}" width="50px" height="50px" alt="">@else<img style="border-radius: 50%;" src="{{ asset("public/default.png") }}" width="50px" height="50px" alt="">@endif</td><td>{!! $model->name !!}</td><td>{!! $model->description !!}</td><td>@if($model->status)<span class="label label-success">Active</span>@else<span class="label label-danger">In-Active</span>@endif</td><td width="250px"><a href="{{ route("computer.show", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Show Computer" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a><a href="{{ route("computer.edit", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Edit Computer" class="btn btn-primary btn-xs" style="margin-left: 3px;"><i class="fa fa-edit"></i> Edit</a><button data-toggle="tooltip" data-placement="top" title="Delete Computer" class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ route("computer.destroy", $model->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i> Delete</button></td>
    </tr>
@endforeach
<tr>
    <td colspan="8">
        Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
        <div class="d-flex justify-content-center">
            {!! $models->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
