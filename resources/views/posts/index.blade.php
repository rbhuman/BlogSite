@extends('layouts.app')
@section('title','posts')

@Section('content')


<h1>Posts</h1><hr/>
    @if(count($posts)>0)
        @foreach($posts as $post)
        <div class="well">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                <img style="width:100%" src="{{Storage::url($post->c_img)}}">

                </div>
                <div class="col-md-8 col-sm-8">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                </div>
            </div>
        
        </div>
         @endforeach
        {{$posts->links()}}
    @else
        <p>No Posts Found</p>
     @endif


@endsection