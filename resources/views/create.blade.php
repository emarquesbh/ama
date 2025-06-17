@extends('layouts.app')

@section('content')
    <h1>Novo Curso</h1>

    <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="schedule">Horário</label>
            <input type="text" name="schedule" id="schedule" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="day">Dia</label>
            <input type="text" name="day" id="day" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="fee">Mensalidade</label>
            <input type="number" name="fee" id="fee" class="form-control" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="image_small">Imagem Pequena</label>
            <input type="file" name="image_small" id="image_small" class="form-control">
        </div>

        <div class="form-group">
            <label for="image_large">Imagem Grande</label>
            <input type="file" name="image_large" id="image_large" class="form-control">
        </div>

        <div class="form-group">
            <label for="active">Ativo</label>
            <input type="checkbox" name="active" id="active" value="1" checked>
        </div>

        <div class="form-group">
            <label for="canceled">Cancelado</label>
            <input type="checkbox" name="canceled" id="canceled" value="1">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
