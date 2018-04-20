@extends('layouts.app')
@section('title','posts')

@section('content')
   
   <a href="/posts" class="btn btn-default">Go Back</a>
     <h1>{!! $posts->title !!}</h1><hr/>
     <img  style="width:700px;height:500px;" src="{{Storage::url($posts->c_img)}}">
     <hr/>

     <div>
         {!! $posts->body !!}
     </div>
     <hr>
     <small>Written on {{$posts->created_at}} by {{$posts->user->name}}</small>
     <hr>
     @if(!Auth::guest())
       @if(Auth::user()->id ==$posts->user_id)

            <a href="{{$posts->id}}/edit" class="btn btn-default">Edit Post</a>
            {!!Form::open(['url'=>'posts/'.$posts->id,'method'=>'DELETE','class'=>'pull-right'])!!}
            {!!Form::SUBMIT('Delete Post',['class'=>'btn btn-danger'])!!}
            {!!Form::close()!!}
            <hr/>
    @endif
  @endif

@endsection