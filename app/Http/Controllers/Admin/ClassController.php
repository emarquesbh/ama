<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\Course;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = ClassRoom::with('course')->latest()->paginate(10);
        return view('admin.classes.index', compact('classes'));
    }

    public function create()
    {
        $courses = Course::where('active', true)->pluck('name', 'id');
        return view('admin.classes.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string|max:255',
            'teacher_name' => 'nullable|string|max:255',
            'schedule' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'max_students' => 'nullable|integer|min:1',
            'active' => 'boolean',
        ]);

        ClassRoom::create($request->all());

        return redirect()->route('admin.classes.index')
            ->with('success', 'Turma criada com sucesso!');
    }

    public function show(ClassRoom $class)
    {
        $class->load('course', 'students');
        return view('admin.classes.show', compact('class'));
    }

    public function edit(ClassRoom $class)
    {
        $courses = Course::where('active', true)->pluck('name', 'id');
        return view('admin.classes.edit', compact('class', 'courses'));
    }

    public function update(Request $request, ClassRoom $class)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string|max:255',
            'teacher_name' => 'nullable|string|max:255',
            'schedule' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'max_students' => 'nullable|integer|min:1',
            'active' => 'boolean',
        ]);

        $class->update($request->all());

        return redirect()->route('admin.classes.index')
            ->with('success', 'Turma atualizada com sucesso!');
    }

    public function destroy(ClassRoom $class)
    {
        // Verificar se há matrículas associadas
        if ($class->enrollments()->count() > 0) {
            return redirect()->route('admin.classes.index')
                ->with('error', 'Não é possível excluir a turma porque existem matrículas associadas a ela.');
        }

        $class->delete();

        return redirect()->route('admin.classes.index')
            ->with('success', 'Turma excluída com sucesso!');
    }
}