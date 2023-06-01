@extends('app')

@section('content')
  <div class="container w-25 border p-4 mp-4">
    <form action="{{ route('todos-update', ['id' => $todo->id]) }}" method="post">
      @method('PATCH')
      @csrf

      @if (session('success'))
        <h6 class="alert alert-success">{{ session('success')}}</h6>
        
      @endif

      @error('title')
      <h6 class="alert alert-danger">{{ $message }}</h6>
      @enderror

      <div class="mb-3">
        <label class="form-label">Título de tarea</label>
        <input type="text" name="title" class="form-control" value="{{ $todo->title }}">
      </div>
      <button type="submit" class="btn btn-primary">Actualizar nueva tarea</button>
    </form>
  </dvi>
@endsection