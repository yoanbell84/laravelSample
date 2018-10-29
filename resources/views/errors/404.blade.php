@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                 <div class="card-body">
            <h3 class="text-center">There's not power here</h3>
            <h3 class="text-center"><a class="text-center" href="{{route('home')}}">Return To Home</a></h3>
        </div>
            </div>
        </div>
</div>


@endsection