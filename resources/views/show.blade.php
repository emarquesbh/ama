@extends('layouts.app')

@section('content')
    <h1>{{ $course->title }}</h1>

    <p><strong>Descrição:</strong> {{ $course->description }}</p>
    <p><strong>Horário:</strong> {{ $course->schedule }}</p>
    <p><strong>Dia:</strong> {{ $course->day }}</p>
    <p><strong>Mensalidade:</strong> {{ $course->fee }}</p>

    @if($course->image_small)
        <img src="{{ asset('storage/' . $course->image_small) }}" alt="Imagem Pequena" width="200">
    @endif

    @if($course->image_large)
        <img src="{{ asset('storage/' . $course->image_large) }}" alt="Imagem Grande" width="400">
    @endif

    <p><strong>Ativo:</strong> {{ $course->active ? 'Sim' : 'Não' }}</p>
    <p><strong>Cancelado:</strong> {{ $course->canceled ? 'Sim' : 'Não' }}</p>

    <a href="{{ route('admin.courses.index') }}" class="btn btn-primary">Voltar</a>
@endsection
