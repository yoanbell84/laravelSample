@extends('layouts.admin')

@section('content')

<h1>Create Posts</h1>

{!! Form::open(['method'=>'POST','action' => 'AdminPostController@store' , 'files' => true]) !!} 
   
   <div class="form-group">
       {!!Form::Label('title','Title')!!}
       {!!Form::text('title',null,['class'=>'form-control'])!!}
        @if ($errors->has('title'))
        <span class="text-danger">{{ $errors->first('title') }}</span>
        @endif
   </div>
    <div class="form-group">
       {!!Form::Label('category_id','Category')!!}
      {!!Form::select('category_id', $categories , null , ['class'=>'form-control'])!!}
         @if ($errors->has('category_id'))
        <span class="text-danger">{{ $errors->first('category') }}</span>
        @endif
    </div>     
    <div class="form-group">
         {!!Form::Label('photo_id','Photo')!!}
      {!!Form::file('photo_id',['class'=>'form-control'])!!}
    </div>
          <div class="form-group">
       {!!Form::Label('body','Description')!!}
       {!!Form::textarea('body',null,['class'=>'form-control','rows'=>3])!!}
        @if ($errors->has('body'))
        <span class="text-danger">{{ $errors->first('body') }}</span>
        @endif
    </div> 
<br>
   <div class="form-group">
        {!!Form::submit('Create Post',['class'=>'btn btn-primary'])!!}
   </div>

    {!! Form::close() !!}

    @include('admin.includes.formErrors')
    


@stop

