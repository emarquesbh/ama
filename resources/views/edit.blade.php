@extends('layouts.app')

@section('content')
    <h1>Editar Curso</h1>

    <form action="{{ route('admin.courses.update', $course) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $course->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" class="form-control" required>{{ $course->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="schedule">Horário</label>
            <input type="text" name="schedule" id="schedule" class="form-control" value="{{ $course->schedule }}" required>
        </div>

        <div class="form-group">
            <label for="day">Dia</label>
            <input type="text" name="day" id="day" class="form-control" value="{{ $course->day }}" required>
        </div>

        <div class="form-group">
            <label for="fee">Mensalidade</label>
            <input type="number" name="fee" id="fee" class="form-control" step="0.01" value="{{ $course->fee }}" required>
        </div>

        <div class="form-group">
            <label for="image_small">Imagem Pequena</label>
            <input type="file" name="image_small" id="image_small" class="form-control">
            @if($course->image_small)
                <img src="{{ asset('storage/' . $course->image_small) }}" alt="Imagem Pequena" width="100">
            @endif
        </div>

        <div class="form-group">
            <label for="image_large">Imagem Grande</label>
            <input type="file" name="image_large" id="image_large" class="form-control">
            @if($course->image_large)
                <img src="{{ asset('storage/' . $course->image_large) }}" alt="Imagem Grande" width="200">
            @endif
        </div>

        <div class="form-group">
            <label for="active">Ativo</label>
            <input type="checkbox" name="active" id="active" value="1" {{ $course->active ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="canceled">Cancelado</label>
            <input type="checkbox" name="canceled" id="canceled" value="1" {{ $course->canceled ? 'checked' : '' }}>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection
