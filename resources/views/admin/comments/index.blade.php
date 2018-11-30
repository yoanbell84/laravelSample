@extends('layouts.admin')


@section('content')
<h1>Comments</h1>


@if(Session::has('deleted_comment'))
<div class='alert alert-dismissible alert-danger'>
    {{ session('deleted_comment')}}
</div> 
@endif
@if(Session::has('edited_comment'))
<div class='alert alert-dismissible alert-success'>
    {{ session('edited_comment')}}   
</div> 
@endif
@if( Session::has('created_comment') )
<div class='alert alert-dismissible alert-success'>
    {{ session('created_comment')}}   
</div> 
@endif

<div class='col-md-12'>
 <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Post</th>
        <th>Autor</th>
        <th>Email</th>
        <th>Body</th>
        <th>Active</th>
        <th>Created_at</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @if($comments)
        @foreach($comments as $comment)
        <tr>
            <td>{{$comment->id}}</td>
            <td>{{$comment->post->title}}</td>
            <td>{{$comment->author}}</td>
            <td>{{$comment->email}}</td>
            <td>{{$comment->body}}</td>
            <td>{{$comment->is_active}}</td>
            <td>{{$comment->created_at->diffForHumans()}}</td>
            <td>
                <a href="{{route('posts.edit',$comment->post->id)}}" class="">View Post</a> ||
                <a href="" class="">Approve Comment</a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
  </table>
</div>
@stop