@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Turmas</h1>
        <a href="{{ route('admin.classes.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nova Turma
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            @if(isset($classes) && $classes->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Curso</th>
                                <th>Nome</th>
                                <th>Professor</th>
                                <th>Horário</th>
                                <th>Período</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classes as $class)
                                <tr>
                                    <td>{{ $class->id }}</td>
                                    <td>{{ $class->course->name ?? 'N/A' }}</td>
                                    <td>{{ $class->name }}</td>
                                    <td>{{ $class->teacher_name ?? 'Não definido' }}</td>
                                    <td>{{ $class->schedule ?? 'Não definido' }}</td>
                                    <td>
                                        @if($class->start_date && $class->end_date)
                                            {{ $class->start_date->format('d/m/Y') }} a {{ $class->end_date->format('d/m/Y') }}
                                        @elseif($class->start_date)
                                            A partir de {{ $class->start_date->format('d/m/Y') }}
                                        @else
                                            Não definido
                                        @endif
                                    </td>
                                    <td>
                                        @if($class->active)
                                            <span class="badge bg-success">Ativa</span>
                                        @else
                                            <span class="badge bg-danger">Inativa</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.classes.show', $class->id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.classes.edit', $class->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.classes.destroy', $class->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta turma?')">
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
                    {{ $classes->links() }}
                </div>
            @else
                <div class="alert alert-info">
                    Nenhuma turma cadastrada ainda. <a href="{{ route('admin.classes.create') }}">Clique aqui</a> para adicionar a primeira turma.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection