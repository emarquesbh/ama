// app/Http/Controllers/Admin/TurmaController.php

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $courseId = $request->query('course_id');
        
        $query = Turma::with(['course', 'creator']);
        
        if ($courseId) {
            $query->where('course_id', $courseId);
        }
        
        $turmas = $query->latest()->paginate(10);
        $courses = Course::pluck('title', 'id');
        
        return view('admin.turmas.index', compact('turmas', 'courses', 'courseId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $courseId = $request->query('course_id');
        $courses = Course::pluck('title', 'id');
        
        $diasSemana = [
            'monday' => 'Segunda-feira',
            'tuesday' => 'Terça-feira',
            'wednesday' => 'Quarta-feira',
            'thursday' => 'Quinta-feira',
            'friday' => 'Sexta-feira',
            'saturday' => 'Sábado',
            'sunday' => 'Domingo',
        ];
        
        return view('admin.turmas.create', compact('courses', 'courseId', 'diasSemana'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string|max:255',
            'day_of_week' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'max_students' => 'nullable|integer|min:1',
            'active' => 'boolean',
        ]);

        // Adiciona o usuário atual como criador
        $validated['created_by'] = Auth::id();

        Turma::create($validated);

        return redirect()->route('admin.turmas.index', ['course_id' => $request->course_id])
            ->with('success', 'Turma criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Turma $turma)
    {
        $turma->load(['course', 'creator', 'updater']);
        return view('admin.turmas.show', compact('turma'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Turma $turma)
    {
        $courses = Course::pluck('title', 'id');
        
        $diasSemana = [
            'monday' => 'Segunda-feira',
            'tuesday' => 'Terça-feira',
            'wednesday' => 'Quarta-feira',
            'thursday' => 'Quinta-feira',
            'friday' => 'Sexta-feira',
            'saturday' => 'Sábado',
            'sunday' => 'Domingo',
        ];
        
        return view('admin.turmas.edit', compact('turma', 'courses', 'diasSemana'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Turma $turma)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string|max:255',
            'day_of_week' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'max_students' => 'nullable|integer|min:1',
            'active' => 'boolean',
        ]);

        // Adiciona o usuário atual como atualizador
        $validated['updated_by'] = Auth::id();

        $turma->update($validated);

        return redirect()->route('admin.turmas.index', ['course_id' => $turma->course_id])
            ->with('success', 'Turma atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Turma $turma)
    {
        $courseId = $turma->course_id;
        $turma->delete();

        return redirect()->route('admin.turmas.index', ['course_id' => $courseId])
            ->with('success', 'Turma excluída com sucesso!');
    }
}