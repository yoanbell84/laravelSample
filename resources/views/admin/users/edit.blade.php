@extends('layouts.admin')

@section('content')

<h1> Edit Users</h1>

<div class="col-sm-3">
    <img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class='img-responsive img-rounded'>
</div>
 
<div class="col-sm-9">
    
        @include('admin.includes.formErrors')

{!! Form::model($user,['method'=>'PATCH','action' => ['AdminUsersController@update',$user->id] , 'files' => true]) !!} 
   
   <div class="form-group">
       {!!Form::Label('name','Name')!!}
       {!!Form::text('name',null,['class'=>'form-control'])!!}
        @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
   </div>
    <div class="form-group">
       {!!Form::Label('email','Email')!!}
       {!!Form::text('email',null,['class'=>'form-control'])!!}
         @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="form-group">
        {!!Form::Label('role_id','Role')!!}
        {!!Form::select('role_id', $roles , null, ['class'=>'form-control'])!!}
      
    </div>
    <div class="form-group">
        {!!Form::Label('is_active','Status')!!}
        {!!Form::select('is_active', ['1' => 'Active', '0' => 'Not Active'], null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
       {!!Form::Label('password','Password')!!}
       {!!Form::password('password',['class'=>'form-control'])!!}
         @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
   </div>
    <div class="form-group">
       {!!Form::Label('password_confirmation','Confirm Password')!!}
       {!!Form::password('password_confirmation',['class'=>'form-control'])!!}
         @if ($errors->has('password_confirmation'))
        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
        @endif
   </div>
    <div class="form-group">
         {!!Form::Label('phto_id','Avatar')!!}
      {!!Form::file('photo_id',['class'=>'form-control'])!!}
    </div>
<br>
   
    <div class="row col-sm-9">
        <div class="col-sm-3"> 
            <div class="form-group">
            {!!Form::submit('Update User',['class'=>'btn btn-primary pull-left'])!!}
            </div>            
        </div>
          {!! Form::close() !!}
        <div class="col-sm-3">
            {!!Form::open(['method'=>'DELETE','action' => ['AdminUsersController@destroy',$user->id]])!!}
            {!!Form::submit('Delete User',['class'=>'btn btn-danger'])!!}
            {!! Form::close() !!}
        </div>
    </div>
  

        
</div>
    
@stop

