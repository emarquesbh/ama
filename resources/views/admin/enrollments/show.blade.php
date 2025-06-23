@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detalhes da Matrícula</h1>
        <div>
            <a href="{{ route('admin.enrollments.edit', $enrollment->id) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Editar
            </a>
            <a href="{{ route('admin.enrollments.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informações da Matrícula</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 200px;">ID</th>
                                <td>{{ $enrollment->id }}</td>
                            </tr>
                            <tr>
                                <th>Aluno</th>
                                <td>
                                    <a href="{{ route('admin.students.show', $enrollment->student->id) }}">
                                        {{ $enrollment->student->name }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>Turma</th>
                                <td>
                                    <a href="{{ route('admin.classes.show', $enrollment->class->id) }}">
                                        {{ $enrollment->class->name }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>Curso</th>
                                <td>
                                    <a href="{{ route('admin.courses.show', $enrollment->class->course->id) }}">
                                        {{ $enrollment->class->course->name }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>Data de Matrícula</th>
                                <td>{{ $enrollment->enrollment_date ? date('d/m/Y', strtotime($enrollment->enrollment_date)) : 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if($enrollment->status == 'active')
                                        <span class="badge bg-success">Ativa</span>
                                    @elseif($enrollment->status == 'completed')
                                        <span class="badge bg-info">Concluída</span>
                                    @elseif($enrollment->status == 'cancelled')
                                        <span class="badge bg-danger">Cancelada</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Observações</th>
                                <td>{{ $enrollment->notes ?? 'Nenhuma observação' }}</td>
                            </tr>
                            <tr>
                                <th>Data de Criação</th>
                                <td>{{ $enrollment->created_at->format('d/m/Y H:i:s') }}</td>
                            </tr>
                            <tr>
                                <th>Última Atualização</th>
                                <td>{{ $enrollment->updated_at->format('d/m/Y H:i:s') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informações do Aluno</h6>
                </div>
                <div class="card-body">
                    <p><strong>Nome:</strong> {{ $enrollment->student->name }}</p>
                    <p><strong>Email:</strong> {{ $enrollment->student->email }}</p>
                    <p><strong>Telefone:</strong> {{ $enrollment->student->phone ?? 'Não informado' }}</p>
                    <p><strong>Data de Nascimento:</strong> {{ $enrollment->student->birth_date ? date('d/m/Y', strtotime($enrollment->student->birth_date)) : 'Não informada' }}</p>
                    <hr>
                    <a href="{{ route('admin.students.show', $enrollment->student->id) }}" class="btn btn-info btn-sm w-100">
                        <i class="fas fa-user"></i> Ver Perfil Completo
                    </a>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informações da Turma</h6>
                </div>
                <div class="card-body">
                    <p><strong>Nome:</strong> {{ $enrollment->class->name }}</p>
                    <p><strong>Professor:</strong> {{ $enrollment->class->teacher_name ?? 'Não informado' }}</p>
                    <p><strong>Horário:</strong> {{ $enrollment->class->schedule ?? 'Não informado' }}</p>
                    <p><strong>Período:</strong> 
                        @if($enrollment->class->start_date && $enrollment->class->end_date)
                            {{ date('d/m/Y', strtotime($enrollment->class->start_date)) }} a {{ date('d/m/Y', strtotime($enrollment->class->end_date)) }}
                        @elseif($enrollment->class->start_date)
                            A partir de {{ date('d/m/Y', strtotime($enrollment->class->start_date)) }}
                        @else
                            Não informado
                        @endif
                    </p>
                    <hr>
                    <a href="{{ route('admin.classes.show', $enrollment->class->id) }}" class="btn btn-info btn-sm w-100">
                        <i class="fas fa-chalkboard"></i> Ver Detalhes da Turma
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection