@extends('layouts.admin')
@section('content')
<h1> Media </h1>

@if(Session::has('delete_file'))
<div class='alert alert-dismissible alert-danger'>
    {{ session('delete_file')}}
</div> 
@endif

@if($photos)

 <table class="table table-bordered">
    <thead>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>Created</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
       
        @foreach($photos as $photo)
        <tr>
            <td>{{$photo->id}}</td>
            <td><a href="{{route('media.edit',$photo->id)}}"><img height="50" src="{{$photo->file ? $photo->file : 'http://placehold.it/400x400'}}" alt=""></a></td>
            <td>{{$photo->created_at->diffForHumans()}}</td>
            <td>
                <a href="{{route('media.edit',$photo->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" title="Edit"></span></a> 
                <div class="col-sm-3">
                    {!!Form::open(['method'=>'DELETE','action' => ['AdminMediaController@destroy',$photo->id]])!!}
                    {!!Form::submit('Delete Photo',['class'=>'btn btn-danger'])!!}
                    {!! Form::close() !!}
                </div>
            </td>
        </tr>
        @endforeach
       
    </tbody>
 </table>
@endif
@stop