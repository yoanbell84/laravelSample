@extends('layouts.admin')

@section('content')

<h1> Edit Category</h1>


<div class="col-sm-9">
    
        @include('admin.includes.formErrors')

{!! Form::model($category,['method'=>'PATCH','action' => ['AdminCategoryController@update',$category->id] , 'files' => true]) !!} 
   
   <div class="form-group">
       {!!Form::Label('name','Name')!!}
       {!!Form::text('name',null,['class'=>'form-control'])!!}
        @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
   </div>
<br>
   
    <div class="row col-sm-9">
        <div class="col-sm-4"> 
            <div class="form-group">
            {!!Form::submit('Update Category',['class'=>'btn btn-primary pull-left'])!!}
            </div>            
        </div>
          {!! Form::close() !!}
        <div class="col-sm-3">
            {!!Form::open(['method'=>'DELETE','action' => ['AdminCategoryController@destroy',$category->id]])!!}
            {!!Form::submit('Delete Category',['class'=>'btn btn-danger'])!!}
            {!! Form::close() !!}
        </div>
    </div>
  

        
</div>
    
@stop

