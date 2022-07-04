@foreach($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{  $models->firstItem()+$key }}.</td>
        <td>{{ $model->name }}</td><td>{{ $model->description }}</td><td>{{ $model->price }}</td><td>@if($model->status)<span class="label label-success">Active</span>@else<span class="label label-danger">In-Active</span>@endif</td><td width="250px"><a href="{{ route("medical.show", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Show Medical" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a><a href="{{ route("medical.edit", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Edit Medical" class="btn btn-primary btn-xs" style="margin-left: 3px;"><i class="fa fa-edit"></i> Edit</a><button data-toggle="tooltip" data-placement="top" title="Delete Medical" class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ route("medical.destroy", $model->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i> Delete</button></td>
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
