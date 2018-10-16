@extends('layouts.admin')

@section('content')

<h1> Create Users</h1>
 
{!! Form::open(['method'=>'POST','action' => 'AdminUsersController@store' , 'files' => true]) !!} 
   
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
        {!!Form::select('role_id', $roles , 3, ['class'=>'form-control'])!!}
      
    </div>
    <div class="form-group">
        {!!Form::Label('status','Status')!!}
        {!!Form::select('status', ['1' => 'Active', '0' => 'Not Active'], 1, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
       {!!Form::Label('password','Password')!!}
       {!!Form::password('password',['class'=>'form-control'])!!}
         @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
   </div>
    <div class="form-group">
       {!!Form::Label('confirmPassword','Confirm Password')!!}
       {!!Form::password('confirmPassword',['class'=>'form-control'])!!}
         @if ($errors->has('confirmPassword'))
        <span class="text-danger">{{ $errors->first('confirmPassword') }}</span>
        @endif
   </div>
    <div class="form-group">
         {!!Form::Label('avatar','Avatar')!!}
      {!!Form::file('avatar',['class'=>'form-control'])!!}
    </div>
<br>
   <div class="form-group">
        {!!Form::submit('Create User',['class'=>'btn btn-primary'])!!}
   </div>

    {!! Form::close() !!}

    @include('admin.includes.formErrors')
    
@stop

