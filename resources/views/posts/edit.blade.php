@extends('layouts.app')
@section('title','Create posts')

@Section('content')

<h1>Edit Posts</h1><hr/>
 
{{Form::open(['url'=>'posts/'.$post->id,'method'=>'PUT','enctype'=>'multipart/form-data'])}}
  <div class="form-group">
    {{Form::label('title','Title')}}
    {{Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Title'])}}
    {{Form::label('title','Body')}}
    {{Form::textarea('body',$post->body,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body Text'])}}
  </div>
  <div class="form-group">
      {{Form::file('c_img')}}
   </div>
 
  {{Form::submit('submit',['class'=>'btn btn-primary'])}}
 {{Form::close()}}
@endsection