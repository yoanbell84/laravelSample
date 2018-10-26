@extends('layouts.admin')


@section('content')
<h1>Users</h1>




 <table class="table table-bordered">
    <thead>
      <tr>
        <th>id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Status</th>
        <th>Role</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @if($users)
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td><img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
            <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
            <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" title="Edit User"></span></a> <a href="{{route('users.destroy',$user->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove" title="Delete User"></span></a></td>
        </tr>
        @endforeach
        @endif
    </tbody>
  </table>

@stop