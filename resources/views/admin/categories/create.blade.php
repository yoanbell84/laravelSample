@extends('layouts.admin')

@section('content')

<h1>Create Category</h1>

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
    


@stop

