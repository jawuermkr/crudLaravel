@extends('app')

@section('content')
  <div class="container w-75 border p-3 mt-3">
    <form action="{{ route('todos')}}" method="post">
      @csrf

      @if (session('success'))
        <h6 class="alert alert-success">{{ session('success')}}</h6>
        
      @endif

      @error('title')
      <h6 class="alert alert-danger">{{ $message }}</h6>
      @enderror

      <div class="mb-3">
        <label class="form-label">Tarea</label>
        <textarea type="text" name="title" class="form-control"></textarea>
      </div>
      <button type="submit" class="btn btn-outline-primary">Crear nueva tarea</button>
    </form>
    <hr>
    <div >
      @foreach ($todos as $todo)
      <div class="row py-1">
        <div class="col-md-9 d-flex align-items-center">
            <a href="{{ route('todos-edit', ['id' => $todo->id]) }}">{{ $todo->title }}</a>
        </div>

        <div class="col-md-3 d-flex justify-content-end">
            <form action="{{ route('todos-destroy', [$todo->id]) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger btn-sm">Eliminar</button>
            </form>
        </div>
      </div>
      @endforeach
    </div>
  </dvi>
@endsection