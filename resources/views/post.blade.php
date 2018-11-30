@extends('layouts.blog-post')
@section('content')
<h1>Posts</h1>
                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span>{{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="">
                <hr>

                <!-- Post Content -->
                <p class="lead">{{$post->body}}</p>
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                                <div class="well">
                    <h4>Leave a Comment:</h4>                    
                    {!! Form::open(['method'=>'POST','action' => 'PostCommentsController@store' ]) !!} 
                    
                    <input type='hidden' name="post_id" value="{{$post->id}}">
                        <div class="form-group">
                        {!!Form::Label('body','Body')!!}
                        {!!Form::textarea('body',null,['class'=>'form-control', 'name'=>'body'])!!}
                         @if ($errors->has('body'))
                         <span class="text-danger">{{ $errors->first('body') }}</span>
                         @endif
                        </div>
                        @if( Session::has('created_comment') )
                            <div class='alert alert-dismissible alert-success'>
                                {{ session('created_comment')}}   
                            </div> 
                        @endif
                 <br>
                    <div class="form-group">
                         {!!Form::submit('Submit',['class'=>'btn btn-primary','rows'=>'3'])!!}
                    </div>

                     {!! Form::close() !!}

                     @include('admin.includes.formErrors')
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                 
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                  
                    
              


@stop
@section('right-sidebar') 
   <h4>Categories</h4>
   
    @if($post->category)
        <div class="row">
            <div class="col-lg-6">
            <ul class="list-unstyled">
            <li><a href="#">{{$post->category->name}}</a>
            </ul>
            </div>  </div>
    @endif
                    
@stop