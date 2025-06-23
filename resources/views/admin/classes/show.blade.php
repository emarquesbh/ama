@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detalhes da Turma</h1>
        <div>
            <a href="{{ route('admin.classes.edit', $class->id) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Editar
            </a>
            <a href="{{ route('admin.classes.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informações da Turma</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 200px;">ID</th>
                                <td>{{ $class->id }}</td>
                            </tr>
                            <tr>
                                <th>Curso</th>
                                <td>
                                    <a href="{{ route('admin.courses.show', $class->course->id) }}">
                                        {{ $class->course->name }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>Nome</th>
                                <td>{{ $class->name }}</td>
                            </tr>
                            <tr>
                                <th>Professor</th>
                                <td>{{ $class->teacher_name ?? 'Não definido' }}</td>
                            </tr>
                            <tr>
                                <th>Horário</th>
                                <td>{{ $class->schedule ?? 'Não definido' }}</td>
                            </tr>
                            <tr>
                                <th>Data de Início</th>
                                <td>{{ $class->start_date ? $class->start_date->format('d/m/Y') : 'Não definida' }}</td>
                            </tr>
                            <tr>
                                <th>Data de Término</th>
                                <td>{{ $class->end_date ? $class->end_date->format('d/m/Y') : 'Não definida' }}</td>
                            </tr>
                            <tr>
                                <th>Número Máximo de Alunos</th>
                                <td>{{ $class->max_students }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if($class->active)
                                        <span class="badge bg-success">Ativa</span>
                                    @else
                                        <span class="badge bg-danger">Inativa</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Data de Criação</th>
                                <td>{{ $class->created_at->format('d/m/Y H:i:s') }}</td>
                            </tr>
                            <tr>
                                <th>Última Atualização</th>
                                <td>{{ $class->updated_at->format('d/m/Y H:i:s') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Estatísticas</h6>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h5>Alunos Matriculados</h5>
                        <h2 class="text-primary">{{ $class->students->count() }}</h2>
                        <div class="progress">
                            @php
                                $percentage = $class->max_students > 0 ? ($class->students->count() / $class->max_students) * 100 : 0;
                            @endphp
                            <div class="progress-bar" role="progressbar" style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">{{ round($percentage) }}%</div>
                        </div>
                        <small class="text-muted">{{ $class->students->count() }} de {{ $class->max_students }} vagas preenchidas</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Alunos Matriculados</h6>
            <a href="{{ route('admin.enrollments.create', ['class_id' => $class->id]) }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> Matricular Aluno
            </a>
        </div>
        <div class="card-body">
            @if($class->students->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Data de Matrícula</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($class->students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->pivot->enrollment_date ? date('d/m/Y', strtotime($student->pivot->enrollment_date)) : 'N/A' }}</td>
                                    <td>
                                        @if($student->pivot->status == 'active')
                                            <span class="badge bg-success">Ativa</span>
                                        @elseif($student->pivot->status == 'completed')
                                            <span class="badge bg-info">Concluída</span>
                                        @elseif($student->pivot->status == 'cancelled')
                                            <span class="badge bg-danger">Cancelada</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.students.show', $student->id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.enrollments.edit', $student->pivot->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.enrollments.destroy', $student->pivot->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja cancelar esta matrícula?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    Nenhum aluno matriculado nesta turma ainda.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection