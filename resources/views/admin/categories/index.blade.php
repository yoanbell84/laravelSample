@extends('layouts.admin')


@section('content')
<h1>Categories</h1>


@if(Session::has('delete_post'))
<div class='alert alert-dismissible alert-danger'>
    {{ session('deleted_category')}}
</div> 
@endif
@if(Session::has('edited_post'))
<div class='alert alert-dismissible alert-success'>
    {{ session('edited_category')}}   
</div> 
@endif
@if( Session::has('created_post') )
<div class='alert alert-dismissible alert-success'>
    {{ session('created_category')}}   
</div> 
@endif
<div class='col-md-3'>
    
    {!! Form::open(['method'=>'POST','action' => 'AdminCategoryController@store' , 'files' => true]) !!} 
   
   <div class="form-group">
       {!!Form::Label('name','Name')!!}
       {!!Form::text('name',null,['class'=>'form-control'])!!}
        @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
   </div>
<br>
   <div class="form-group">
        {!!Form::submit('Submit',['class'=>'btn btn-primary'])!!}
   </div>

    {!! Form::close() !!}

    @include('admin.includes.formErrors')
</div>


<div class='col-md-9'>
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
        @if($categories)
        @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
           
            <td><a href="{{route('categories.edit',$category->id)}}">{{$category->name}}</a></td>
          
            <td>{{$category->created_at->diffForHumans()}}</td>
            <!--<td>{{$category->updated_at->diffForHumans()}}</td>-->
            <td>
                <a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" title="Edit Category"></span></a> 
                <a href="{{route('categories.destroy',$category->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove" title="Delete Category"></span></a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
  </table>
</div>
@stop