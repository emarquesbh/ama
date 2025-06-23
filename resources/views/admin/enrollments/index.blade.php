@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Matrículas</h1>
        <a href="{{ route('admin.enrollments.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nova Matrícula
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            @if(isset($enrollments) && $enrollments->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Aluno</th>
                                <th>Turma</th>
                                <th>Curso</th>
                                <th>Data de Matrícula</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($enrollments as $enrollment)
                                <tr>
                                    <td>{{ $enrollment->id }}</td>
                                    <td>
                                        <a href="{{ route('admin.students.show', $enrollment->student->id) }}">
                                            {{ $enrollment->student->name }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.classes.show', $enrollment->class->id) }}">
                                            {{ $enrollment->class->name }}
                                        </a>
                                    </td>
                                    <td>{{ $enrollment->class->course->name ?? 'N/A' }}</td>
                                    <td>{{ $enrollment->enrollment_date ? date('d/m/Y', strtotime($enrollment->enrollment_date)) : 'N/A' }}</td>
                                    <td>
                                        @if($enrollment->status == 'active')
                                            <span class="badge bg-success">Ativa</span>
                                        @elseif($enrollment->status == 'completed')
                                            <span class="badge bg-info">Concluída</span>
                                        @elseif($enrollment->status == 'cancelled')
                                            <span class="badge bg-danger">Cancelada</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.enrollments.show', $enrollment->id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.enrollments.edit', $enrollment->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.enrollments.destroy', $enrollment->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta matrícula?')">
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
                
                <div class="mt-4">
                    {{ $enrollments->links() }}
                </div>
            @else
                <div class="alert alert-info">
                    Nenhuma matrícula cadastrada ainda. <a href="{{ route('admin.enrollments.create') }}">Clique aqui</a> para adicionar a primeira matrícula.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection