@extends('layouts.admin')


@section('content')
<h1>Posts</h1>

@if(Session::has('delete_post'))

<div class='alert alert-dismissible alert-danger'>
    
    {{ session('delete_post')}}
    
</div> 
@endif


 <table class="table table-bordered">
    <thead>
      <tr>
        <th>id</th>       
        <th>Photo</th>
         <th>Author</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @if($posts)
        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>           
            <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
            <td>{{$post->user->name}}</td>
            <td><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td>         
            <td>{{$post->body}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
            <td><a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" title="Edit Post"></span></a> 
                <a href="{{route('posts.destroy',$post->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove" title="Delete Post"></span></a></td>
        </tr>
        @endforeach
        @endif
    </tbody>
  </table>

@stop