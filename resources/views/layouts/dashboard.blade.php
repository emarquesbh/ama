@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <h1 class="mb-4">Dashboard</h1>
    
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Cursos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $coursesCount ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Turmas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $classesCount ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Alunos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $studentsCount ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Matrículas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $enrollmentsCount ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Cursos Recentes</h6>
                    <a href="{{ route('admin.courses.index') }}" class="btn btn-sm btn-primary">Ver Todos</a>
                </div>
                <div class="card-body">
                    @if(isset($recentCourses) && $recentCourses->count() > 0)
                        <div class="list-group">
                            @foreach($recentCourses as $course)
                                <a href="{{ route('admin.courses.show', $course->id) }}" class="list-group-item list-group-item-action">
                                    {{ $course->name }}
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center">Nenhum curso cadastrado ainda.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Turmas Recentes</h6>
                    <a href="{{ route('admin.classes.index') }}" class="btn btn-sm btn-primary">Ver Todas</a>
                </div>
                <div class="card-body">
                    @if(isset($recentClasses) && $recentClasses->count() > 0)
                        <div class="list-group">
                            @foreach($recentClasses as $class)
                                <a href="{{ route('admin.classes.show', $class->id) }}" class="list-group-item list-group-item-action">
                                    {{ $class->name }} ({{ $class->course->name }})
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center">Nenhuma turma cadastrada ainda.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection