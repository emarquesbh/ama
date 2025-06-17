@extends('layouts.app')

@section('content')
    <h1>Cursos</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">Novo Curso</a>

    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Horário</th>
                <th>Dia</th>
                <th>Mensalidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->schedule }}</td>
                    <td>{{ $course->day }}</td>
                    <td>{{ $course->fee }}</td>
                    <td>
                        <a href="{{ route('admin.courses.show', $course) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
