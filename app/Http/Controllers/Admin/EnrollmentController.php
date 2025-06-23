<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with(['student', 'class.course'])
            ->latest()
            ->paginate(10);
            
        return view('admin.enrollments.index', compact('enrollments'));
    }

    public function create(Request $request)
    {
        $students = Student::where('active', true)
            ->orderBy('name')
            ->pluck('name', 'id');
            
        $classes = ClassRoom::where('active', true)
            ->with('course')
            ->get()
            ->map(function ($class) {
                return [
                    'id' => $class->id,
                    'name' => $class->name . ' (' . $class->course->name . ')'
                ];
            })
            ->pluck('name', 'id');
            
        // Pré-selecionar a turma se fornecida na URL
        $selectedClassId = $request->input('class_id');
        
        return view('admin.enrollments.create', compact('students', 'classes', 'selectedClassId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'class_id' => 'required|exists:classes,id',
            'enrollment_date' => 'required|date',
            'status' => 'required|in:active,completed,cancelled',
            'notes' => 'nullable|string',
        ]);

        // Verificar se o aluno já está matriculado na turma
        $existingEnrollment = Enrollment::where('student_id', $request->student_id)
            ->where('class_id', $request->class_id)
            ->first();
            
        if ($existingEnrollment) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Este aluno já está matriculado nesta turma.');
        }

        // Verificar se a turma atingiu o limite de alunos
        $class = ClassRoom::findOrFail($request->class_id);
        $currentEnrollments = $class->enrollments()->where('status', 'active')->count();
        
        if ($currentEnrollments >= $class->max_students) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Esta turma já atingiu o número máximo de alunos.');
        }

        Enrollment::create($request->all());

        return redirect()->route('admin.enrollments.index')
            ->with('success', 'Matrícula realizada com sucesso!');
    }

    public function show(Enrollment $enrollment)
    {
        $enrollment->load(['student', 'class.course']);
        return view('admin.enrollments.show', compact('enrollment'));
    }

    public function edit(Enrollment $enrollment)
    {
        $students = Student::where('active', true)
            ->orderBy('name')
            ->pluck('name', 'id');
            
        $classes = ClassRoom::where('active', true)
            ->with('course')
            ->get()
            ->map(function ($class) {
                return [
                    'id' => $class->id,
                    'name' => $class->name . ' (' . $class->course->name . ')'
                ];
            })
            ->pluck('name', 'id');
            
        return view('admin.enrollments.edit', compact('enrollment', 'students', 'classes'));
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'class_id' => 'required|exists:classes,id',
            'enrollment_date' => 'required|date',
            'status' => 'required|in:active,completed,cancelled',
            'notes' => 'nullable|string',
        ]);

        // Verificar se o aluno já está matriculado na turma (exceto a matrícula atual)
        $existingEnrollment = Enrollment::where('student_id', $request->student_id)
            ->where('class_id', $request->class_id)
            ->where('id', '!=', $enrollment->id)
            ->first();
            
        if ($existingEnrollment) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Este aluno já está matriculado nesta turma.');
        }

        // Verificar se a turma atingiu o limite de alunos (apenas se estiver mudando de turma)
        if ($request->class_id != $enrollment->class_id && $request->status == 'active') {
            $class = ClassRoom::findOrFail($request->class_id);
            $currentEnrollments = $class->enrollments()->where('status', 'active')->count();
            
            if ($currentEnrollments >= $class->max_students) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Esta turma já atingiu o número máximo de alunos.');
            }
        }

        $enrollment->update($request->all());

        return redirect()->route('admin.enrollments.index')
            ->with('success', 'Matrícula atualizada com sucesso!');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return redirect()->route('admin.enrollments.index')
            ->with('success', 'Matrícula excluída com sucesso!');
    }
}