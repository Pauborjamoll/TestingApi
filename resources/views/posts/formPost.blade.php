@extends('layoutPosts')
@section('formpost')
<h2>Publicar post</h2>
<form action="" method="post">
    @csrf
    <div class="container">
    <label for="titulo" class="form-label">{{__('Título')}}</label>
    <input type="text" name="titulo" value="{{ old('titulo')}}"><br>
    <label for="contenido">{{__('Contenido')}}</label>
    <div class="mb-3">
        <label for="contenido" class="form-label">{{__('Contenido')}}</label>
        <textarea name="contenido" class="form-control" rows="2" value="{{ old('contenido')}}"></textarea>
    </div>
    </div>
</form>

@endsection