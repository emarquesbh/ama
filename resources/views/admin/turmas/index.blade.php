// resources/views/admin/turmas/index.blade.php

@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>Turmas</h2>
                    <a href="{{ route('admin.turmas.create', ['course_id' => $courseId]) }}" class="btn btn-primary">Nova Turma</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <form action="{{ route('admin.turmas.index') }}" method="GET" class="form-inline">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <label class="input-group-text" for="course_id">Filtrar por Curso:</label>
                                        <select class="form-select" id="course_id" name="course_id" onchange="this.form.submit()">
                                            <option value="">Todos os Cursos</option>
                                            @foreach($courses as $id => $title)
                                                <option value="{{ $id }}" {{ $courseId == $id ? 'selected' : '' }}>{{ $title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Curso</th>
                                <th>Nome da Turma</th>
                                <th>Dia da Semana</th>
                                <th>Horário</th>
                                <th>Capacidade</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($turmas as $turma)
                                <tr>
                                    <td>{{ $turma->id }}</td>
                                    <td>{{ $turma->course->title }}</td>
                                    <td>{{ $turma->name }}</td>
                                    <td>{{ $turma->day_of_week_formatted }}</td>
                                    <td>{{ $turma->schedule_formatted }}</td>
                                    <td>{{ $turma->max_students ?? 'Ilimitado' }}</td>
                                    <td>
                                        @if ($turma->active)
                                            <span class="badge bg-success">Ativa</span>
                                        @else
                                            <span class="badge bg-danger">Inativa</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.turmas.show', $turma) }}" class="btn btn-sm btn-info">Ver</a>
                                            <a href="{{ route('admin.turmas.edit', $turma) }}" class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('admin.turmas.destroy', $turma) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta turma?')">Excluir</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $turmas->appends(['course_id' => $courseId])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection