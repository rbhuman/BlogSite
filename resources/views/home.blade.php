@include('style.boot')
@extends('layouts.app')
@section('title','Dashbord')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                   
                <div class="card-header"><h4>Your Dashboard</h4></div><hr>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <div class="panel-body">
                        <a href="/posts/create" class="btn btn-primary">Create Post</a>
                        <h3>Your Bolg Posts</h3>
                        @if(count($posts)>0)
                            <table class="table table-striped">
                                    <tr>
                                        <th>Title</th>
                                        <th></th>
                                        <th></th>
                                       
                                    </tr>
                                      @foreach($posts as $post)
                                        <tr>
                                            <td><a href="/posts/{{$post->id}}">{{$post->title}}</td>
                                            <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>
                                            <td>
                                            {!!Form::open(['url'=>'posts/'.$post->id,'method'=>'DELETE'])!!}
                                            {!!Form::SUBMIT('Delete Post',['class'=>'btn btn-danger'])!!}
                                            
                                            </td>
                                     </tr>
                                    @endforeach
                                @else
                                <p>You Have No posts !</p>

                                </table>
                       @endif

                    </div>
                </div>

            
            </div>
        </div>

       
    </div>
</div>
@endsection
