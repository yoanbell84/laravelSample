@extends('layouts.admin')

@section('content')

<h1> Edit Post</h1>

<div class="col-sm-3">
    <img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="" class='img-responsive img-rounded'>
</div>
 
<div class="col-sm-9">
    
        @include('admin.includes.formErrors')

{!! Form::model($post,['method'=>'PATCH','action' => ['AdminPostController@update',$post->id] , 'files' => true]) !!} 
   
   <div class="form-group">
       {!!Form::Label('title','Title')!!}
       {!!Form::text('title',null,['class'=>'form-control'])!!}
        @if ($errors->has('title'))
        <span class="text-danger">{{ $errors->first('title') }}</span>
        @endif
   </div>
    <div class="form-group">
       {!!Form::Label('category_id','Category')!!}
      {!!Form::select('category_id', $categories , null , ['class'=>'form-control' , 'placeholder'=>'Chose a category'])!!}
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
   
    <div class="row col-sm-9">
        <div class="col-sm-3"> 
            <div class="form-group">
            {!!Form::submit('Update Post',['class'=>'btn btn-primary pull-left'])!!}
            </div>            
        </div>
          {!! Form::close() !!}
        <div class="col-sm-3">
            {!!Form::open(['method'=>'DELETE','action' => ['AdminPostController@destroy',$post->id]])!!}
            {!!Form::submit('Delete Post',['class'=>'btn btn-danger'])!!}
            {!! Form::close() !!}
        </div>
    </div>
  

        
</div>
    
@stop

