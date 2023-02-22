@extends('layouts.plantilla')

@section('content')
<div class="container">
<h1>Lista de Posts</h1><br>
<div class="container">
    @foreach ($posts as $post)
    <br><ul><h6> User id:{{$post->user_id}}</h6>    
    <h4>{{$post->title}}</h4>   
    <p>{{$post->body}}</p>
    <button>Editar</button>
    <a href="{{route('posts.create')}}"></a>
    </ul>
    @endforeach
    </div>
    </div>
@endsection