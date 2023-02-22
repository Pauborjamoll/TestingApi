@extends('layouts.plantilla')

@section('content')

<div class="container">
<h2>Publicar post</h2>
<br><br>
<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
    @endforeach
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <div class="container">
    <label for="title" class="form-label">{{__('Título')}}</label><br>
    <input type="text" name="title" value="{{ old('title')}}">
    @error('title')
        <br>
        <small style="color:red">{{$message}}</small><br>
    @enderror
    <br>
    
    <label for="body" class="form-label">{{__('Cuerpo')}}</label>
    <textarea name="body" class="form-control" rows="2" value="{{ old('body')}}"></textarea>
    @error('body')
            <br>
            <small style="color:red">{{$message}}</small><br>
    @enderror
     
    </div>
</form>
</div>
</div>
@endsection()